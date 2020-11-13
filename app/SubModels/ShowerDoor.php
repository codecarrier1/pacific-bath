<?php

namespace App\SubModels;

use App\Color;
use App\Interfaces\SubModel;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Scopes\ShowerDoorScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * App\SubModels\ShowerDoor
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
 * @property-read mixed $glass_color_id
 * @property-read mixed $trim_color_id
 * @property-read mixed $width
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerDoor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShowerDoor extends Product implements SubModel
{
    protected $table = 'products';

    protected $appends = ['trim_color_id', 'glass_color_id', 'description', 'width'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ShowerDoorScope);

    }

    public function getGlassColorIdAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('glass_color_' . $this->id, function (){
            return $this->options()->where('key', 'glass_color_id')->first()->value ?? '?';
        });
    }

    public function getTrimColorIdAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('trim_color_' . $this->id, function (){
            return $this->options()->where('key', 'trim_color_id')->first()->value ?? '?';
        });
    }

    public function getWidthAttribute()
    {
        return Cache::rememberForever('width_' . $this->id, function (){
            return $this->options()->where('key', 'width')->first()->value ?? '?';
        });
    }

    public function getDescriptionAttribute()
    {
        return Cache::rememberForever('description_' . $this->id, function (){
            $doorType = $this->options()->where('key', 'door_type')->first()->value ?? '?';
            $handles = $this->options()->where('key', 'handles')->first()->value ?? '?';
            $glassThickness = $this->options()->where('key', 'glass_thickness')->first()->value ?? '?';
            return "$doorType with $handles and $glassThickness glass";
        });
    }

    public static function getResponseData(Collection $products)
    {
        // Group our colors by sub-category ID
        $groupedGlassColors = $products->mapToGroups(function ($item, $key) {
            return [$item['product_sub_category_id'] => $item['glass_color_id']];
        });

        // Fetch all of our color data grouped by sub category ID
        $glassColors = $groupedGlassColors->map(function (Collection $colorIds, int $subCategoryId) {
            return Color::findMany($colorIds->toArray(), [
                'id',
                'name',
            ])
                ->toArray();
        });

        // Group our colors by sub-category ID
        $groupedTrimColors = $products->mapToGroups(function ($item, $key) {
            return [$item['product_sub_category_id'] => $item['trim_color_id']];
        });

        // Fetch all of our color data grouped by sub category ID
        $trimColors = $groupedTrimColors->map(function (Collection $colorIds, int $subCategoryId) {
            return Color::findMany($colorIds->toArray(), [
                'id',
                'name',
            ])
                ->toArray();
        });

        $unfilteredDescriptions =  $products->mapToGroups(function ($item, $key) {
            return [$item['product_sub_category_id'] => $item['description']];
        });
        $descriptions = collect();
        foreach($unfilteredDescriptions as $subCategoryId => $collection){
            $descriptions[$subCategoryId] = collect();
            foreach($collection as $item){
                if(!$descriptions[$subCategoryId]->contains($item)){
                    $descriptions[$subCategoryId]->push($item);
                }
            }

        }

        $subCategories = ProductSubCategory::where('product_category_id', ProductCategory::SHOWER_DOORS)
            ->select('id', 'name')
            ->withCount('products')->get()->each->getImages()->toArray();
        return [
            'products' => $products,
            'glassColors' => $glassColors->toArray(),
            'descriptions' => $descriptions,
            'trimColors' => $trimColors->toArray(),
            'subCategories' => $subCategories,
        ];
    }
}
