<?php

namespace App\Http\Requests;

use App\Payment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
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
            'type' => [
                'sometimes',
                'string',
                Rule::in(Payment::getReflectedConstants('TYPE_', $asHumane = false)),
            ],
            'final_type' => [
                'sometimes',
                'string',
                Rule::in(Payment::getReflectedConstants('TYPE_', $asHumane = false)),
            ],
        ];
    }
}
