<?php

namespace App\Observers;

use App\Jobs\ConfirmAppointmentInSalesforce;
use App\Jobs\ResultAppointmentInSalesforce;
use App\Jobs\UpdateExternalIdInSalesforce;
use App\Lead;
use App\Payment;
use App\Quote;
use App\SalesDisposition;
use Illuminate\Support\Facades\Cache;
use App\Notifications\NewLeadHasBeenAssigned;
use Illuminate\Support\Facades\Log;

class LeadObserver
{
    /**
     * @param Lead $lead
     * Notifies the sales representative
     */
    public function created(Lead $lead)
    {
        $lead->user->notify(new NewLeadHasBeenAssigned($lead));
        Log::debug("An email to " . $lead->user->email . " should have been sent.");
        $quote = Quote::create([
           'lead_id' => $lead->id,
           'user_id' => $lead->user_id,
        ]);
        Log::debug("Quote $quote->id should have been created.");

        $payment = Payment::create([
            'lead_id' => $lead->id,
            'user_id' => $lead->user_id,
            'quote_id' => $quote->id,
        ]);
        Log::debug("Payment $payment->id should have been created.");

        UpdateExternalIdInSalesforce::dispatch($lead);
        Log::debug("external ID in salesforce should have been updated.");
    }

    public function updated(Lead $lead)
    {
        $this->maybeConfirmAppointment($lead);
        $this->maybeResultAppointment($lead);
        $this->maybeNotifyNewUser($lead);
    }

    private function maybeNotifyNewUser($lead)
    {
        if($lead->isDirty('user_id')){
            $lead->user->notify(new NewLeadHasBeenAssigned($lead));
            Log::debug("An email to " . $lead->user->email . " should have been sent.");
        }
    }

    private function maybeResultAppointment(Lead $lead)
    {
        if($lead->isDirty('sales_disposition_id')){
            if($lead->getOriginal('sales_disposition_id') == SalesDisposition::ACKNOWLEDGED){
                if($lead->sales_disposition_id != SalesDisposition::NEW){
                   ResultAppointmentInSalesforce::dispatch($lead);
                    Log::debug('the appointment should have been resulted');
                }
            }
        }
    }

    private function maybeConfirmAppointment(Lead $lead)
    {
        if($lead->isDirty('sales_disposition_id')){
            if($lead->getOriginal('sales_disposition_id') == SalesDisposition::NEW){
                if($lead->sales_disposition_id == SalesDisposition::ACKNOWLEDGED){
                    ConfirmAppointmentInSalesforce::dispatch($lead);
                    Log::debug('the appointment should have been confirmed');

                }
            }
        }
    }
}
