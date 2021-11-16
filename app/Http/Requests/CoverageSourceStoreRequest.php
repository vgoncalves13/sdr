<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverageSourceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'table_name' => 'required|unique:coverage_sources',
            'postal_code_field' => 'required',
            'number_field' => 'required'
        ];
    }
}
