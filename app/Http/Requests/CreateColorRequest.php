<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('manage_colors');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'colors' => 'required',
            'colors.*.name' => 'required|string',
            'colors.*.id' => 'nullable|integer',
            'colors.*.swatch' => 'required_without:id|image',

        ];
    }
}
