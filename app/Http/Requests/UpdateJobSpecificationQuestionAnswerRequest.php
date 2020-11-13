<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobSpecificationQuestionAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if they can update discovery questions, they can update job specification questions
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
            'answer' => 'sometimes|required|string',
            'comment' => 'sometimes|required|string',
            'lead_id' => 'required|exists:leads,id',
        ];
    }
}
