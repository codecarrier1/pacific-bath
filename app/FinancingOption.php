<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FinancingOption
 *
 * @property int $id
 * @property string $name
 * @property float|null $default_monthly_payment_factor
 * @property float|null $default_interest_rate
 * @property int|null $number_of_months
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereDefaultInterestRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereDefaultMonthlyPaymentFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereNumberOfMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $institution
 * @property string|null $notes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FinancingOption whereNotes($value)
 */
class FinancingOption extends Model
{
    public static function calcPayment(float $principal, int $totalPayments, float $rate)
    {
        $interest = $principal * $rate * $totalPayments;
        return ($principal + $interest) / $totalPayments;
    }
}
