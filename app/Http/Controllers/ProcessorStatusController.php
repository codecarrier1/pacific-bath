<?php

namespace App\Http\Controllers;

use App\Lead;
use App\ProcessorStatus;

class ProcessorStatusController extends Controller
{
    public function update(Lead $lead, $processorStatusId)
    {
        $lead->processorStatus()->associate($processorStatusId);
        $lead->save();

        return response()->json($lead->processor_status_id);
    }
}
