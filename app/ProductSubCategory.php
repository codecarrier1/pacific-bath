<?php

namespace App;

use App\SubModels\ConstructionAddition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\ProductSubCategory
 *
 * @property int $id
 * @property string $name
 * @property int $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubModels\ConstructionAddition[] $constructionAdditions
 * @property-read int|null $construction_additions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\ProductCategory $productCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductSubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductSubCategory extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * @var array
     */
    protected $guarded = [];

    public function options()
    {
        return $this->hasManyThrough(Option::class, Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function constructionAdditions()
    {
        return $this->hasMany(ConstructionAddition::class, 'product_sub_category_id');
    }

    /**
     * Register a single image for our category
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('images');
    }

    /**
     * @param  \Spatie\MediaLibrary\Models\Media|null  $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
            ->nonQueued();
    }

    public function getImage()
    {
        $this->image = $this->getFirstMediaUrl('images');
        if(!$this->image){
            $this->image = asset("images/img2.png");
        }
        $this->unsetRelation('media');
    }

    public function getImages()
    {
        $array = [];
        $images = $this->getMedia('images');
        foreach($images as $image){
            $array[] = $image->getUrl();
        }
        if(empty($array)){
            $array = [asset("images/img2.png")];
        }
        $this->images = $array;
        $this->unsetRelation('media');
    }



}
