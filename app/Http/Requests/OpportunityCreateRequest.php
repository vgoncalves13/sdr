<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityCreateRequest extends FormRequest
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
            'cnpj' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'cnpj.required' => 'O campo :attribute é obrigatório!'
        ];
    }

    public function attributes()
    {
        return [
            'cnpj' => 'CNPJ',
        ];
    }
}
