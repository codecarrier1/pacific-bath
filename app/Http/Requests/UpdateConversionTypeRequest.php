<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConversionTypeRequest extends FormRequest
{
    /**
     * The route already requires authentication, no further check needed.
     *
     * @return bool
     */
    public function authorize()
    {
        // if they can update discovery questions, they can update conversion type.
        // no additional permission is needed.
        return auth()->user()->can('update_discovery_question_answers');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'conversion_type_id' => 'required|exists:conversion_types,id',
        ];
    }
}
