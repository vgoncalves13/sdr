<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'login' => ['required','unique:users'],
            'password' => ['required',Password::min(6)],
            'name' => 'required',
            'email' => ['required','unique:peoples'],
            'telephone' => 'required',
            'sector_id' => 'required',
            'UF' => 'required'
        ];
    }
}
