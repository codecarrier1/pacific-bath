<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\Color
 *
 * @property int $id
 * @property string $name
 * @property int $is_metallic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereIsMetallic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Color extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    protected $appends = ['url'];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('swatch')->singleFile();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_product', 'color_id', 'product_id');
    }

    public function getUrlAttribute()
    {
        return Cache::rememberForever('swatch_url_' . $this->id, function () {
            return $this->getFirstMediaUrl('swatch');
        });
    }

    public function getImage()
    {
        $this->image = $this->getFirstMediaUrl('images');
        if (!$this->image) {
            $this->image = asset("images/img2.png");
        }
        $this->unsetRelation('media');
    }
}
