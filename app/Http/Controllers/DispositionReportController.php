<?php

namespace App\Http\Controllers;

use App\DispositionReport;
use App\Events\DispositionStatusUpdated;
use App\Http\Requests\DispositionReportRequest;
use App\Lead;
use App\SalesDisposition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DispositionReportController extends Controller
{
    public function store(DispositionReportRequest $request)
    {
        $input = $request->validated();
        $dispositionReportId = $request->input('disposition_report_id');
        unset($input['disposition_report_id']);
        $lead = Lead::find($input['lead_id']);
        $lead->sales_disposition_id = $input['disposition_status_id'];
        $lead->save();
        unset($input['disposition_status_id']);
        if(!$dispositionReportId){
            return DispositionReport::create($input);

        }
        $report = DispositionReport::find($dispositionReportId);
        $report->update($input);
        event(new DispositionStatusUpdated($lead, $input['disposition_status']));
        return response()->json($report);

    }

    public function show(Lead $lead)
    {
        $data = [
            'last_name' => $lead->last_name,
            'dispositions' => SalesDisposition::select('id', 'name')->get(),
            'service_name' => $lead->service->name,
            'amount' => $lead->payment->discounted_total,
            'current_disposition_id' => $lead->sales_disposition_id,
            'disposition_report' => $lead->dispositionReport,
            'user_id' => auth()->id(),
        ];
        return response()->json($data);
    }

}

