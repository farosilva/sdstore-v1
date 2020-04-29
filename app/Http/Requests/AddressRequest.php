<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'post_code'                 => preg_replace('/[^0-9]/','',$this->post_code),
        ]);
    }

    public function rules()
    {
        return [
            'address_name'              => ['nullable','max:15'],
            'post_code'                 => ['required', 'size:8'],
            'street_name'               => ['required', 'max:60'],
            'number'                    => ['required', 'max:6'],
            'complem'                   => ['nullable', 'max:15'],
            'district'                  => ['required', 'max:30'],
            'city'                      => ['required', 'max:30'],
            'city_code'                 => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'max'                   => 'Deve conter no max. :max caracteres',
            'size'                  => 'Deve conter :size caracteres',
            'required'              => 'Campo obrigatório',
            'required_if'           => 'Campo obrigatório',
            'in'                    => 'UF inválida'
        ];
    }
}
