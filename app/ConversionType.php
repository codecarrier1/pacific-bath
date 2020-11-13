<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ConversionType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversionType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConversionType extends Model
{
    protected $guarded = [];

    protected $appends = ['state'];

    public function getStateAttribute()
    {
        return false;
    }
}
