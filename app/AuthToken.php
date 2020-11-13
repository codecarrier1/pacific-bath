<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AuthToken
 *
 * @property int $id
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthToken whereUserId($value)
 */
class AuthToken extends Model
{
    protected $fillable = [
        'type',
        'access_token',
        'refresh_token',
    ];

    const SALESFORCE = 'salesforce';
    const HELLOSIGN = 'hellosign';

    const TYPES = [
      self::SALESFORCE,
      self::HELLOSIGN,
    ];
}
