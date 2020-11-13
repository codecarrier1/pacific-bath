<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * App\Option
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string|null $type
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ProductCategory $category
 * @property-read string $color
 * @property-read int $product_category_id
 * @property-read \App\Product $product
 * @property-read \App\ProductSubCategory $subCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Option whereValue($value)
 * @mixin \Eloquent
 */
class Option extends Model
{
    protected $guarded = [];

    const DEFINITIONS = [
        ProductCategory::SHOWER_PANS => [
            'plumbing_position' => 'string',
            'pan_color_id' => Color::class,
            'width' => 'decimal',
            'depth' => 'decimal',
            'wall_kit_available' => 'boolean',
        ],
        ProductCategory::WALLS_JOINTS_TRIM => [
            'description' => 'string',
            'color_id' => Color::class,
        ],
        ProductCategory::WALK_IN_BATHS => [
            'plumbing_position' => 'string',
            'tub_color_id' => Color::class,
            'drain_color_id' => Color::class,
            'fixture_color_id' => Color::class,
        ],
        ProductCategory::BATHTUBS => [
            'plumbing_position' => 'string',
            'tub_color_id' => Color::class,
            'fixture_color_id' => Color::class,
        ],
        ProductCategory::FIXTURES_ACCESSORIES => [
            'fixture_color_id' => Color::class,
            'description' => 'string',
        ],
        ProductCategory::SHOWER_DOORS => [
            'glass_color_id' => Color::class,
            'door_type' => 'integer',
            'trim_color_id' => Color::class,
            'handles' => 'string',
            'glass_thickness' => 'string',
        ],
        ProductCategory::BATHTUB_DOORS => [
            'glass_color_id' => Color::class,
            'trim_color_id' => Color::class,
        ],
        ProductCategory::CONSTRUCTION_ADDITIONS => [
            'short_description' => 'string',
            'long_description' => 'string',
        ],
    ];

    /**
     * Define our static positional's
     */
    const POSITIONS = [
        'Right',
        'Left',
        'Center',
        'Right/Left',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'product_category_id',
        'color',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function getColor()
    {
        if (Str::contains($this->key, 'color')) {
            return Color::find($this->value);
        }
    }

    /**
     * @return string
     */
    public function getColorAttribute(): string
    {
        return $this->getColor() ?? '?';
    }

    /**
     * Mock our product category id attribute based on product relationship
     *
     * @return int
     */
    public function getProductCategoryIdAttribute(): int
    {
        return $this->product->product_category_id ?? $this->product['product_category_id'];
    }

    /**
     * Builds a label array of our static options by a category id
     *
     * @param  int  $productCategoryId
     * @return array
     */
    public function getDefinitionsAsLabels(int $productCategoryId = 0): array
    {
        // Sanity check to verify we have a valid product ID
        if (!in_array($productCategoryId, ProductCategory::CONSTANTS)) {
            return [];
        }

        // Use our product category as a base
        $definitions = static::DEFINITIONS[$productCategoryId];

        // Loop our definitions and create a label array
        foreach ($definitions as $label => $type) {
            $labels[$label] = $label;
        }

        return $labels ?? [];
    }

    /**
     * Collect our allowable types
     *
     * @return \Illuminate\Support\Collection
     */
    public static function allowableTypes(): Collection
    {
        return collect(collect(static::DEFINITIONS)->flatMap(function ($values) {
            return array_values(array_values($values));
        }))->unique();
    }
}
