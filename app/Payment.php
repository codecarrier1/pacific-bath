<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Medalink\Reflects\Constants as ReflectedConstants;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int $lead_id
 * @property int $quote_id
 * @property string|null $type
 * @property string|null $final_type
 * @property float|null $deposit
 * @property float|null $discounted_total
 * @property float|null $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Lead $lead
 * @property-read \App\Quote $quote
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDiscountedTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereFinalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AppliedDiscount[] $appliedDiscounts
 * @property-read int|null $applied_discounts_count
 * @property mixed|null $details
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDetails($value)
 * @property string|null $deposit_payment_type
 * @property string|null $final_payment_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDepositPaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereFinalPaymentType($value)
 */
class Payment extends Model
{
    use ReflectedConstants;

    /**
     * Define our payment types
     */
    const TYPE_CREDIT_CARD = 'CREDIT_CARD';
    const TYPE_CHECK = 'CHECK';

    protected $fillable = [
        'type',
        'final_type',
        'user_id',
        'quote_id',
        'lead_id',
    ];

    protected $casts = [
      'details' => 'object',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
