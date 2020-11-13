<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PropertyType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PropertyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyType extends Model
{
    protected $guarded = [];

    protected $appends = ['state'];

    public function getStateAttribute()
    {
        return false;
    }
}
