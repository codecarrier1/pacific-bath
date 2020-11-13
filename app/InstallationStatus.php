<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InstallationStatus
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InstallationStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InstallationStatus extends Model
{
    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
