<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'phone_1'           => preg_replace('/[^0-9]/','',$this->phone_1),
            'phone_2'           => preg_replace('/[^0-9]/','',$this->phone_2),
            'whatsapp'          => preg_replace('/[^0-9]/','',$this->whatsapp),
        ]);
    }

    public function rules()
    {
        return [
            'contact_name'      => ['required','min:5','max:45'],
            'phone_1'           => ['required','between:10,11'],
            'phone_2'           => ['between:10,11'],
            'whatsapp'          => ['required_with:accept_whatsapp','size:11'],
            'email'             => ['required_with:accept_email','nullable','max:60','email'],
        ];
    }

    public function messages()
    {
        return [
            'required'          => 'Campo obrigatório',
            'required_with'     => 'Campo não informado',
            'min'               => 'Deve conter no min. :min caracteres',
            'max'               => 'Deve conter no max. :max caracteres',
            'size'              => 'Deve conter :size caracteres',
            'between'           => 'Deve ter entre :min e :max caracteres',
            'email'             => 'Deve ser um endereço de e-mail válido',
        ];
    }
}
