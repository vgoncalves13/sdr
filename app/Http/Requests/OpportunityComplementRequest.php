<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityComplementRequest extends FormRequest
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
            'cnpj' => 'required',
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'contact_name' => 'required',
            'contact_tel' => 'required',
            'contact_email' => 'required',
            'services.*.service_id' => 'required',
            'services.*.quantity' => 'required'
        ];
    }
}
