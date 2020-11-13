<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Medalink\Reflects\Constants as ReflectsConstants;

/**
 * App\SalesDocument
 *
 * @property int $id
 * @property string $template_id
 * @property string $title
 * @property string|null $message
 * @property string|null $type
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SalesDocumentSigner[] $signers
 * @property-read int|null $signers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesDocument extends Model
{
    use ReflectsConstants;

    /**
     * Document types
     */
    const TYPE_BEFORE_SEVEN_SEVEN = 'BEFORE_SEVEN_SEVEN';
    const TYPE_AFTER_SEVEN_SEVEN = 'AFTER_SEVEN_SEVEN';
    const TYPE_SIGN_REQUIRED = 'SIGN_REQUIRED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'template',
        'document',
        'type',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signers(): HasMany
    {
        return $this->hasMany(SalesDocumentSigner::class);
    }

    /**
     * Scope a query to only include active documents
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * @param \App\Lead $lead
     * @return bool
     */
    public function signedByLead(Lead $lead)
    {
        $check = $this->signers->where('lead_id', $lead->id)->count() ?? 0;

        if ($check > 0) {
            return true;
        }

        return false;
    }
}
