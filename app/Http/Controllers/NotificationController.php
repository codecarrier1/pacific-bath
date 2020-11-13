<?php

namespace App\Http\Controllers;

use App\Lead;
use App\User;
use App\SalesDisposition;
use Illuminate\Http\Request;
use App\Events\LeadAcknowledged;

class NotificationController extends Controller
{
    public function show(User $user)
    {
        return auth()->user()->leads()->where('is_acknowledged', 0)->count();
    }

    public function update(Lead $lead, SalesDisposition $disposition)
    {
        $lead->update(['is_acknowledged' => 1, 'sales_disposition_id' => $disposition->id]);
        LeadAcknowledged::dispatch($lead->user_id);
    }
}
