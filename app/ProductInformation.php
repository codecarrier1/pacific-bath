<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Medalink\Reflects\Constants as ReflectsConstants;

/**
 * App\ProductInformation
 *
 * @property int $id
 * @property int $service_id
 * @property string $type
 * @property string $content
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductInformation whereWeight($value)
 * @mixin \Eloquent
 */
class ProductInformation extends Model
{
    use ReflectsConstants;

    /**
     * Defines a product information type
     */
    const TYPE_OVERVIEW = 'OVERVIEW';

    /**
     * Defines a product information type
     */
    const TYPE_SAFETY = 'SAFETY';

    /**
     * Defines a product information type
     */
    const TYPE_WARRANTY = 'WARRANTY';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'type',
        'content',
        'weight',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'weight' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(\App\Service::class);
    }
}
