<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
            'login' => ['required',Rule::unique('users')->ignore($this->user->id)],
            'name' => 'required',
            'email' => ['required',Rule::unique('peoples')->ignore($this->user->id)],
            'telephone' => 'required',
            'team_id' => 'required',
            'UF' => 'required',
            'role' => 'required'
        ];
    }
}
