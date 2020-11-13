<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\VeteranDiscount
 *
 * @property int $id
 * @property string|null $name
 * @property int $discount
 * @property int|null $max_value
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VeteranDiscount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VeteranDiscount extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
