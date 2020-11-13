<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProcessorStatus
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessorStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProcessorStatus extends Model
{
    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
