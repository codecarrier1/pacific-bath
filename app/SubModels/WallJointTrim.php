<?php

namespace App\SubModels;

use App\Color;
use App\Interfaces\SubModel;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Scopes\WallJointTrimScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * App\SubModels\WallJointTrim
 *
 * @property int $id
 * @property string $sku
 * @property float $price
 * @property int $product_category_id
 * @property int|null $product_sub_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ProductCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read int|null $colors_count
 * @property-read null|int $color_id
 * @property-read mixed $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\WallJointTrim whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WallJointTrim extends Product implements SubModel
{
    protected $table = 'products';

    protected $appends = [
        'description',
        'color_id',
    ];

    public function bootIfNotBooted()
    {
        parent::boot();
        static::addGlobalScope(new WallJointTrimScope());
    }

    public function getDescriptionAttribute()
    {
        return Cache::rememberForever('description_'.$this->id, function () {
            return $this->options()
                ->where('key', 'description')
                ->first();
        });
    }

    /**
     * @return null|int
     */
    public function getColorIdAttribute(): ?int
    {
        return Cache::tags(['colors'])
            ->rememberForever('color_'.$this->id, function () {
                return $this->options()
                        ->where('key', 'color_id')
                        ->first()->value ?? null;
            });
    }

    /**
     * @param  \Illuminate\Support\Collection  $products
     * @return array
     */
    public static function getResponseData(Collection $products)
    {
        // Group our colors by sub-category ID
        $groupedColors = $products->mapToGroups(function ($item, $key) {
            return [$item['product_sub_category_id'] => $item['color_id']];
        });

        // Fetch all of our color data grouped by sub category ID
        $colors = $groupedColors->map(function (Collection $colorIds, int $subCategoryId) {
            return Color::findMany($colorIds->toArray(), [
                'id',
                'name',
            ])
                ->toArray();
        });

        // Fetch all options grouped by sub category ID
        $descriptions = $products->pluck('description')
            ->unique('value')
            ->mapToGroups(function ($item, $key) {
                return [$item['product']['product_sub_category_id'] => $item->value];
            });

        $subCategories = ProductSubCategory::where('product_category_id', ProductCategory::WALLS_JOINTS_TRIM)
            ->select('id', 'name')
            ->withCount('products')
            ->get()->each->getImage()
            ->toArray();

        return [
            'products' => $products,
            'colors' => $colors->toArray(),
            'descriptions' => $descriptions->toArray(),
            'subCategories' => $subCategories,
        ];
    }
}
