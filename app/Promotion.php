<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Promotion
 *
 * @property int $id
 * @property string|null $name
 * @property string $type
 * @property int $discount
 * @property int|null $max_value
 * @property \Illuminate\Support\Carbon|null $begins_on
 * @property \Illuminate\Support\Carbon|null $ends_on
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereBeginsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereEndsOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $discount_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereDiscountType($value)
 */
class Promotion extends Model
{
    public $casts = [
        'begins_on' => 'date',
        'ends_on' => 'date',
    ];

    const PERCENT = 'percent';
    const PERCENT_WITH_MAX = 'percent_with_max';
    const DOLLAR_AMOUNT = 'dollar_amount';

    const DISCOUNT_TYPES = [
      self::PERCENT,
      self::PERCENT_WITH_MAX,
      self::DOLLAR_AMOUNT,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function scopeIsActive(Builder $query)
    {
        return $query->whereDate('begins_on', '<=', now())
            ->whereDate('ends_on', '>=', now());
    }
}
