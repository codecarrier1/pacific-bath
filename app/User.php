<?php

namespace App;

use App\Exceptions\IncorrectSalesRepSalesforceId;
use App\Traits\HasLeads;
use Illuminate\Support\Facades\Cache;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $salesforce_id
 * @property string $timezone
 * @property int $location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lead[] $leads
 * @property-read int|null $leads_count
 * @property-read \App\Location $location
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSalesforceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\AuthToken $salesforceToken
 */
class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles, HasMediaTrait, HasLeads;

    const GOOGLE_DEFAULT_IMAGE = 'https://ssl.gstatic.com/s2/profiles/images/silhouette200.png';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getPhoneAttribute($value)
    {
        // Formats all phone numbers to be displayed as (XXX) XXX-XXXX
        $numbers = preg_replace("/[^\d]/", '', $value); // just in case something gets by the mutator.
        return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", '($1) $2-$3', $numbers);
    }

    public function setPhoneAttribute($value)
    {
        // Sets all phone numbers as numbers only, regardless of what is input
        $this->attributes['phone'] = preg_replace('/[^0-9]/s', '', $value);
    }

    public function getAvatar()
    {
        return Cache::rememberForever('avatar_' . $this->id, function(){
            if (! $media = $this->getFirstMedia('avatar')) {
                $avatar = new \LasseRafn\InitialAvatarGenerator\InitialAvatar;
                $svg = $avatar->name($this->full_name)->background('#e0e0e0')->color('#333333')->generateSvg()->toXMLString();

                return str_replace('<svg ', '<svg class="rounded-full inline-block"', $svg);
            }
            return $media->img('', ['class' => 'rounded-full inline-block', 'width' => 40, 'height' => 40]);
        });
    }

    public function getSmallAvatar()
    {
        return Cache::remember('small_avatar_' . $this->id, 60 * 60 * 24, function(){
            if (! $media = $this->getFirstMedia('avatar')) {
                $avatar = new \LasseRafn\InitialAvatarGenerator\InitialAvatar;
                $svg = $avatar->name($this->full_name)->background('#e0e0e0')->color('#333333')->generateSvg()->toXMLString();

                return str_replace('<svg ', '<svg class="mr-8 rounded-full block"', $svg);
            }
            return $media->img('', ['class' => 'mr-8 rounded-full block', 'width' => 40, 'height' => 40]);
        });
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')->singleFile();
    }

    public static function findBySalesforceId($salesforceId)
    {

        $salesRep =  User::where('salesforce_id', $salesforceId )->first();
        if(!$salesRep){
            throw new IncorrectSalesRepSalesforceId('No User with the salesforce_id ' . $salesforceId . ' exists in the local database.');
        }
        return $salesRep;
    }

    public function salesforceToken()
    {
        return $this->hasOne(AuthToken::class)->where('type', AuthToken::SALESFORCE);
    }
}
