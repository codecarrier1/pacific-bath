<?php

namespace App\Http\Controllers;

use App\Lead;

class InstallationStatusController extends Controller
{
    public function update(Lead $lead, $installationStatusId)
    {
        $lead->installationStatus()->associate($installationStatusId);
        $lead->save();

        return response()->json($lead->installation_status_id);
    }
}
