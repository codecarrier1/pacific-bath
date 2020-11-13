<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SalesDisposition
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition isNotSold()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition isSold()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDisposition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesDisposition extends Model
{
    const SALES = 1;

    const NEW = 2;

    const ACKNOWLEDGED = 3;

    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function scopeIsNotSold($query)
    {
        return $query->where('id', '!=', self::SALES);
    }

    public function scopeIsSold($query)
    {
        return $query->where('id', '=', self::SALES);
    }
}
