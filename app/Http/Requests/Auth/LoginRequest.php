<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email_login'         => ['required_without_all:username,cpf'],
            'cpf_login'           => ['required_without_all:username,email'],
            'password_login'      => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required_without_all'      => 'Campo obrigatório',
            'required'                  => 'Campo obrigatório',
        ];
    }
}
