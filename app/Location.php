<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Location
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $address_2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property int|null $installation_manager_id
 * @property int|null $director_of_ops_id
 * @property int|null $director_of_sales_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereDirectorOfOpsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereDirectorOfSalesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereInstallationManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereZip($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
