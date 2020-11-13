<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductSubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('manage_product_sub_categories');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|image',
        ];
    }

    public function sanitizedAndValidated()
    {
        $input = $this->validated();
        $input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);

        return $input;
    }
}
