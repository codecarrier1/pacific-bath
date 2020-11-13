<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Lead
 *
 * @property int $id
 * @property string $salesforce_id
 * @property string|null $email
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string|null $address_2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property int|null $amount
 * @property \Illuminate\Support\Carbon $appointment_time
 * @property int|null $processor_id
 * @property int $sales_disposition_id
 * @property int|null $processor_status_id
 * @property int|null $installation_status_id
 * @property int $service_id
 * @property int $user_id
 * @property int $is_acknowledged
 * @property int|null $conversion_type_id
 * @property int|null $property_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DiscoveryQuestionAnswer[] $answers
 * @property-read int|null $answers_count
 * @property-read \App\DispositionReport $dispositionReport
 * @property-read mixed $full_name
 * @property-read \App\InstallationStatus|null $installationStatus
 * @property-read \App\Measurement $measurements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @property-read int|null $notes_count
 * @property-read \App\Payment $payment
 * @property-read \App\User|null $processor
 * @property-read \App\ProcessorStatus|null $processorStatus
 * @property-read \App\Quote $quote
 * @property-read \App\SalesDisposition $salesDisposition
 * @property-read \App\Service $service
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SalesDocumentSigner[] $signedDocuments
 * @property-read int|null $signed_documents_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereAppointmentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereConversionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereInstallationStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereIsAcknowledged($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereProcessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereProcessorStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead wherePropertyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereSalesDispositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereSalesforceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereZip($value)
 * @mixin \Eloquent
 * @property string $salesforce_appointment_id
 * @property string $salesforce_prospect_id
 * @property string|null $salesforce_lead_source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereSalesforceAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereSalesforceLeadSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead whereSalesforceProspectId($value)
 * @property int|null $preselected_color_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Lead wherePreselectedColorId($value)
 * @property-read \App\HomeownersContact $homeOwnerContact
 */
class Lead extends Model
{
    protected $guarded = [];

    protected $dates = ['appointment_time'];

    public function installationStatus()
    {
        return $this->belongsTo(InstallationStatus::class);
    }

    public function dispositionReport()
    {
        return $this->hasOne(DispositionReport::class);
    }

    public function location()
    {
        return $this->belongsToThrough(Location::class, User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function processor()
    {
        return $this->belongsTo(User::class);
    }

    public function processorStatus()
    {
        return $this->belongsTo(ProcessorStatus::class);
    }

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function salesDisposition()
    {
        return $this->belongsTo(SalesDisposition::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signedDocuments(): HasMany
    {
        return $this->hasMany(SalesDocumentSigner::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function answers()
    {
        return $this->hasMany(DiscoveryQuestionAnswer::class);
    }

    public function measurements()
    {
        return $this->hasOne(Measurement::class);
    }

    public function homeOwnerContact()
    {
        return $this->hasOne(HomeownersContact::class);
    }

    public function needsAnalysisRoute()
    {
        return route('discovery.questions', [$this]);
    }

    public function getMeasurement()
    {
        if (!$this->measurements()
            ->count()) {
            $this->measurements()
                ->create(['lead_id' => $this->id]);
        }
        return $this->measurements()
            ->first();
    }
}
