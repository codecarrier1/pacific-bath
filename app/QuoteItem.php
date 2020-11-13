<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\QuoteItem
 *
 * @property int $id
 * @property int $quote_id
 * @property int $product_id
 * @property int $product_category_id
 * @property int|null $product_sub_category_id
 * @property int $quantity
 * @property string $sku
 * @property float $price
 * @property array $options
 * @property string|null $category_name
 * @property string|null $sub_category_name
 * @property string|null $plumbing_position
 * @property float|null $width
 * @property float|null $depth
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $long_description
 * @property int|null $color_id
 * @property int|null $tub_color_id
 * @property int|null $drain_color_id
 * @property int|null $fixture_color_id
 * @property int|null $glass_color_id
 * @property int|null $pan_color_id
 * @property string|null $door_type
 * @property string|null $wall_kit_available
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $color
 * @property-read string $full_product_name
 * @property-read mixed $glass_color
 * @property-read mixed $image
 * @property-read mixed $size
 * @property-read \App\Product $product
 * @property-read \App\Quote $quote
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereDoorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereDrainColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereFixtureColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereGlassColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem wherePanColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem wherePlumbingPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereSubCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereTubColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereWallKitAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuoteItem whereWidth($value)
 * @mixin \Eloquent
 */
class QuoteItem extends Model
{

    protected $guarded = [];

    protected $touches = ['quote'];

    protected $appends = [
        'size',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }

    public function getSizeAttribute(): ?string
    {
        // Prevent size when we have no values
        if (empty($this->width) && empty($this->depth)) {
            return null;
        }

        // Allow single sided values through
        if (empty($this->width)) {
            return sprintf('%d"', $this->depth);
        }

        // Allow single sided values through
        if (empty($this->depth)) {
            return sprintf('%d"', $this->width);
        }

        // When we have both values include them together
        return sprintf('%d" x %d"', $this->width, $this->depth);
    }

    /**
     * Combine different product information to build a product name
     *
     * @return string
     */
    public function getFullProductNameAttribute(): string
    {
        // Set sane grammar defaults
        $categoryName = null;
        $subCategoryName = null;

        // If we have a product description, use it
        if (!empty($this->description)) {
            return $this->description;
        }

        // Safely fetch our color
        $color = $this->color['name'] ?? '';

        // Check if we need to include a specific name for grammar sake
        if (in_array($this->product_category_id, [
            ProductCategory::SHOWER_PANS,
        ])) {
            $categoryName = Str::singular($this->category_name);
        }

        if(!empty($this->sub_category_name)) {
            $subCategoryName = Str::singular($this->sub_category_name);
        }

        return sprintf($format = '%s %s %s', $color, $subCategoryName, $categoryName);
    }

    public function getColorAttribute(): ?array
    {
        $color = collect($this->options)
                ->filter(function ($item) {
                    return Str::endsWith($item['key'], 'color_id');
                })
                ->first()['color'] ?? null;

        if (empty($color)) {
            return null;
        }

        $color = json_decode($color, $assoc = true);

        return $color;
    }

    public function getGlassColorAttribute(): ?array
    {
        $color = collect($this->options)
                ->filter(function ($item) {
                    return Str::is('glass_color_id', $item['key']);
                })
                ->first()['color'] ?? null;

        if (empty($color)) {
            return null;
        }

        $color = json_decode($color, $assoc = true);

        return $color;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageAttribute()
    {
        if($product = $this->product){
            if($image = $product->getFirstMediaUrl('image', 'thumb')){
                return $image;
            }
        }
        return asset('images/svg/logo.svg');
    }
}
