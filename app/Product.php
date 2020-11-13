<?php

namespace App;

use App\Interfaces\HasColors;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\Product
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductSubCategory|null $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model implements HasColors, HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')->singleFile();
    }

    /**
     * @param  \Spatie\MediaLibrary\Models\Media|null  $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(75)
            ->height(75);
    }

}
