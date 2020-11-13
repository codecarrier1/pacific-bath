<?php

namespace App\Http\Controllers;

use App\Jobs\ConfirmAppointmentInSalesforce;
use App\Lead;
use App\SalesDisposition;
use Illuminate\Http\Request;
use App\Events\LeadAcknowledged;
use Illuminate\Support\Facades\Cache;

class SalesDispositionController extends Controller
{
    public function update(Lead $lead, int $salesDispositionId)
    {
        $oldDisposition = $lead->sales_disposition_id;
        $lead->sales_disposition_id = $salesDispositionId;
        $lead->saveOrFail();
        if ($oldDisposition == SalesDisposition::NEW && $salesDispositionId == SalesDisposition::ACKNOWLEDGED) {
            LeadAcknowledged::dispatch($lead->user_id);
            ConfirmAppointmentInSalesforce::dispatch($lead);
        }

        return response()->json($lead->sales_disposition_id);
    }
}
