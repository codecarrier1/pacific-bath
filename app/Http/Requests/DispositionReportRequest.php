<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositionReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lead_id' => 'required|exists:leads,id',
            'user_id' => 'required|exists:users,id',
             'appointment_time' => 'required',
            'service_name' => 'required|exists:services,name',
            'attendees' => 'required',
            'age' => 'required',
            'disposition_status' => 'required|exists:sales_dispositions,name',
            'disposition_status_id' => 'required|exists:sales_dispositions,id',
            'sale_amount' => 'sometimes|required|numeric',
            'notes' => 'required',
            'disposition_report_id' => 'present'
        ];
    }
}
