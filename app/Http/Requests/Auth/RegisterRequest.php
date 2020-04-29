<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cpf_cnpj'      => preg_replace('/[^0-9]/','',$this->cpf_cnpj),
            // 'birth_date'    => preg_replace('/[^0-9]/','',$this->birth_date),
        ]);
    }

    public function rules()
    {
        // dd($this);
        return [
            'cpf_cnpj'                  => ['required', 'unique:users', 'cpf'],
            'full_name'                 => ['required', 'min:5','max:50'],
            'short_name'                => ['required', 'min:3','max:45'],
            'birth_date'                => ['required', 'date_format:d/m/Y', 'before_or_equal:18 years ago'],
            'genre'                     => ['required', 'in:F,M'],
            'email'                     => ['required', 'unique:users','max:60','email'],
            'password'                  => ['required', 'min:8','confirmed'],
            'accept_terms'              => ['accepted'],

        ];
    }

    public function messages()
    {
        return [
            'required'                  => 'Campo obrigatório',
            'min'                       => 'Deve conter no min. :min caracteres',
            'max'                       => 'Deve conter no max. :max caracteres',
            'cpf_cnpj.unique'           => ':attribute já cadastrado',
            'email.unique'              => 'E-mail já cadastrado',
            'confirmed'                 => 'As senhas não conferem',
            'date_format'               => 'Data inválida',
            'before_or_equal'           => 'Deve ter 18 anos ou mais',
            'cpf_cnpj.cpf'              => ':attribute inválido'
        ];
    }

    public function attributes()
    {
        return [
            'cpf_cnpj'                  => (!isset($this->type) || ($this->type == 'F')) ? 'CPF' : 'CNPJ'
        ];
    }
}
