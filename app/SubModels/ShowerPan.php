<?php

namespace App\SubModels;

use App\Color;
use App\Interfaces\SubModel;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Scopes\ShowerPanScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * App\SubModels\ShowerPan
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
 * @property-read mixed $pan_color_id
 * @property-read mixed $plumbing_position
 * @property-read mixed $size
 * @property-read mixed $wall_kit_available
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShowerPan extends Product implements SubModel
{
    protected $table = 'products';
    protected $appends = ['size', 'pan_color_id', 'plumbing_position', 'wall_kit_available'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ShowerPanScope);
    }

    public function getSizeAttribute()
    {
        return Cache::rememberForever('pan_size_' . $this->id, function(){
            $width = $this->options()->where('key','width')->first()->value ?? '?';
            $depth = $this->options()->where('key', 'depth')->first()->value ?? '?';
            return $width . 'x' . $depth;
        });
    }

    public function getPanColorIdAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('pan_color_' . $this->id, function (){
            return $this->options()->where('key', 'pan_color_id')->first()->value ?? '?';
        });
    }


    public function getWallKitAvailableAttribute()
    {
        return Cache::rememberForever('wall_kit_available_' . $this->id, function (){
            return $this->options()->where('key', 'wall_kit_available')->first()->value ?? '?';
        });
    }


    public function getPlumbingPositionAttribute()
    {
        return Cache::rememberForever('plumbing_position_' . $this->id, function (){
            return $this->options()->where('key', 'plumbing_position')->first()->value ?? '?';
        });
    }


    public static function getResponseData(Collection $products)
    {
        $sizeValues = $products->pluck('size')->unique()->values();
        $drains = ShowerPanDrain::all()->toArray();
        $sizeValues = $sizeValues->reject(function ($value){
           return $value === false;
        })->toArray();
        $sizes = [];
        foreach($sizeValues as $sizeValue){
            $sizes[] = ['size' => $sizeValue];
        }
        $panColorIds = $products->pluck('pan_color_id')->unique()->toArray();
        $panColors = Color::findMany($panColorIds, ['id', 'name'])->toArray();
        $plumbVlues = $products->pluck('plumbing_position')->unique()->toArray();
        $plumbingPositions = [];
        foreach($plumbVlues as $plumbVlue){
            if($plumbVlue === 'Right/Left'){
                continue;
            }
            $plumbingPositions[] = ['position' => $plumbVlue];
        }
        $subCategories = ProductSubCategory::select('id', 'name')
            ->withCount('products')
            ->where('product_category_id', ProductCategory::SHOWER_PANS)
            ->get()->each->getImage()->toArray();
        return [
            'products' => $products,
            'sizes' => $sizes,
            'pan_colors' => $panColors,
            'plumbing_positions' => $plumbingPositions,
            'drains' => $drains,
            'subCategories' => $subCategories,
        ];
    }

}
