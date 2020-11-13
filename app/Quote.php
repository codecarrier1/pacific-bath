<?php

namespace App;

use App\Helpers\Math;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Schema;

/**
 * App\Quote
 *
 * @property int $id
 * @property int $lead_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read float $deposit
 * @property-read float $discounted_total
 * @property-read float $total
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\QuoteItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\Lead $lead
 * @property-read \App\Payment $payment
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereUserId($value)
 * @mixin \Eloquent
 */
class Quote extends Model
{
    protected $guarded = [];

    protected $with = ['items'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(QuoteItem::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }


    public static function syncItems(array $validatedData): int
    {
        $quote = self::findOrFail($validatedData['quote_id']);
        $quote->items()
            ->where('product_category_id', $validatedData['product_category_id'])
            ->delete();
        $qtyCreated = 0;
        foreach ($validatedData['products'] as $productData) {
            /** @var \App\Product $product */
            $product = Product::with(['colors', 'category', 'subCategory'])
                ->findOrFail($productData['product_id']);

            // Hydrate our data
            $quoteItem = $quote->items()
                ->create(static::hydrateQuoteItems($product, $productData['quantity']));
            if(array_key_exists('extra', $productData)){
                if(is_array($productData['extra'])){
                    foreach($productData['extra'] as $key => $value){
                        $quoteItem->{$key} = $value;
                    }
                    $quoteItem->save();
                }
            }

            $qtyCreated++;
        }
        return $qtyCreated;
    }

    /**
     * Standard way to hydrate our quote items
     *
     * @param \App\Product $product
     * @param int $quantity
     * @return array
     */
    public static function hydrateQuoteItems(Product $product, $quantity = 1): array
    {
        return [
            'product_id' => $product->id,
            'product_category_id' => $product->product_category_id,
            'product_sub_category_id' => $product->product_sub_category_id,
            'category_name' => $product->category->name,
            'sub_category_name' => optional($product->subCategory)->name, // drains don't have subcategories
            'quantity' => $quantity,
            'price' => $product->price,
            'sku' => $product->sku,
            'plumbing_position' => $product->options->where('key', 'plumbing_position')->pluck('value')->first() ?? null,
            'width' => $product->options->where('key', 'width')->pluck('value')->first() ?? null,
            'depth' => $product->options->where('key', 'depth')->pluck('value')->first() ?? null,
            'description' => $product->options->where('key', 'description')->pluck('value')->first() ?? null,
            'short_description' => $product->options->where('key', 'short_description')->pluck('value')->first() ?? null,
            'long_description' => $product->options->where('key', 'long_description')->pluck('value')->first() ?? null,
            'color_id' => $product->options->where('key', 'color_id')->pluck('value')->first() ?? null,
            'tub_color_id' => $product->options->where('key', 'tub_color_id')->pluck('value')->first() ?? null,
            'drain_color_id' => $product->options->where('key', 'drain_color_id')->pluck('value')->first() ?? null,
            'fixture_color_id' => $product->options->where('key', 'fixture_color_id')->pluck('value')->first() ?? null,
            'glass_color_id' => $product->options->where('key', 'glass_color_id')->pluck('value')->first() ?? null,
            'pan_color_id' => $product->options->where('key', 'pan_color_id')->pluck('value')->first() ?? null,
            'door_type' => $product->options->where('key', 'door_type')->pluck('value')->first() ?? null,
            'wall_kit_available' => $product->options->where('key', 'wall_kit_available')->pluck('value')->first() ?? null,
            'options' => $product->options,
        ];
    }

    /**
     * TODO: Implement real logic to factor this
     *
     * @return float
     */
    public function getTotalAttribute(): float
    {
        // Loop our items and compute our total
        return ($this->items->sum('price') ?? 0.00) * 2;
    }

    /**
     * TODO: Implement real logic to factor this
     *
     * @return float
     */
    public function getDiscountedTotalAttribute(): float
    {
        // Loop our items and compute our total
        return Math::divide($this->total, 2) ?? 0.00;
    }

    /**
     * TODO: Implement real logic to factor this
     *
     * @return float
     */
    public function getDepositAttribute(): float
    {
        // Loop our items and compute our total
        return Math::divide($this->items->sum('price'), 4) ?? 0.00;
    }
}
