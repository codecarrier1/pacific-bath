<?php

namespace App\SubModels;

use App\Color;
use App\Interfaces\SubModel;
use App\Product;
use App\ProductSubCategory;
use App\Scopes\ShowerPanDrainScope;
use App\Scopes\ShowerPanScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * App\SubModels\ShowerPanDrain
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
 * @property-read mixed $drain_color_id
 * @property-read mixed $drain_color_name
 * @property-read mixed $drain_color_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubModels\ShowerPanDrain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShowerPanDrain extends Product
{
    protected $table = 'products';
    protected $appends = ['drain_color_id', 'drain_color_name', 'drain_color_url'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ShowerPanDrainScope);
    }

    public function getDrainColorIdAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('drain_color_id_' . $this->id, function (){
            return $this->options()->where('key', 'drain_color_id')->first()->value ?? '?';
        });
    }


    public function getDrainColorNameAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('drain_color_name_' . $this->id, function (){
            return Color::find($this->drain_color_id)->name ?? '?';
        });
    }

    public function getDrainColorUrlAttribute()
    {
        return Cache::tags(['colors'])->rememberForever('drain_color_url_' . $this->id, function (){
            return Color::find($this->drain_color_id)->url ?? '?';
        });
    }


}
