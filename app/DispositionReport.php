<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\DispositionReport
 *
 * @property int $id
 * @property int $lead_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $appointment_time
 * @property string $service_name
 * @property string $attendees
 * @property string $age
 * @property string $disposition_status
 * @property float $sale_amount
 * @property string $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereAppointmentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereDispositionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereSaleAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereServiceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DispositionReport whereUserId($value)
 * @mixin \Eloquent
 */
class DispositionReport extends Model
{
    protected $guarded = [];

    protected $dates = ['appointment_time'];


    public function getAppointmentTimeAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone(auth()->user()->timezone)
            ->toDateTimeString();
    }
}
