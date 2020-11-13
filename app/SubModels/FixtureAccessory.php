<?php

namespace App\SubModels;

use App\Color;
use App\Interfaces\SubModel;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Scopes\FixtureAccessoryScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * App\SubModels\FixtureAccessory
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
 * @property-read mixed $description
 * @property-read mixed $fixture_color_id
 * @property-read mixed $with_bathtub
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\FixtureAccessory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FixtureAccessory extends Product implements SubModel
{
    protected $table = 'products';

    protected $appends = [
        'fixture_color_id',
        'description',
        'with_bathtub',
    ];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new FixtureAccessoryScope);
    }

    public function getFixtureColorIdAttribute()
    {
        return Cache::tags(['colors'])
            ->rememberForever('fixture_color_'.$this->id, function () {
                return $this->options()
                    ->where('key', 'fixture_color_id')
                    ->first()->value;
            });
    }


    public function getDescriptionAttribute()
    {
        return Cache::rememberForever('description_'.$this->id, function () {
            return $this->options()
                ->where('key', 'description')
                ->first()->value;
        });
    }

    public function getWithBathtubAttribute()
    {
        return Cache::rememberForever('with_bathtub_'.$this->id, function () {
            return $this->options()
                ->where('key', 'with_bathtub')
                ->first()->value;
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
            return [$item['product_sub_category_id'] => $item['fixture_color_id']];
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
        $options = $products->unique('description')
            ->mapToGroups(function (FixtureAccessory $item, $key) {
                return [$item->product_sub_category_id => $item];
            });

        $subCategories = ProductSubCategory::where('product_category_id', ProductCategory::FIXTURES_ACCESSORIES)
            ->select('id', 'name')
            ->withCount('products')->get()->each->getImages()->toArray();

        return [
            'products' => $products,
            'colors' => $colors->toArray(),
            'options' => $options->toArray(),
            'subCategories' => $subCategories,
        ];
    }
}
