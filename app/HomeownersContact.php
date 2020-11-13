<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HomeownersContact
 *
 * @property int $id
 * @property int $lead_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $company
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HomeownersContact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeownersContact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
    ];
}
