<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeasurementsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update_measurements');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'opening_width' => 'sometimes|required|numeric',
            'tub_width' => 'sometimes|required|numeric',
            'right_side_wall' => 'sometimes|required|numeric',
            'right_surround_width' => 'sometimes|required|numeric',
            'room_height' => 'sometimes|required|numeric',
            'left_side_wall' => 'sometimes|required|numeric',
            'left_surround_width' => 'sometimes|required|numeric',
            'ceiling_panel' => 'sometimes|required|numeric',
            'soffit' => 'sometimes|required|numeric',
            'pan_width' => 'sometimes|required|numeric',
            'pan_height' => 'sometimes|required|numeric',
        ];
    }
}
