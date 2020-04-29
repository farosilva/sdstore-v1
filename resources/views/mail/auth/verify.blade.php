@extends('mail.layouts.base')

@section('title')
    Estamos felizes com sua chegada!
@endsection

@section('content')
<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1; color: #555555;">
                    <p class="text-align-sd">Olá <b>{{ @$user->short_name }}</b>, recebemos seu cadastro.</p>
                    <p class="text-align-sd">Para utilizar nossos serviços ative sua conta.</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px;">
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
                        <tr>
                            <td class="button-td button-td-second" style="border-radius: 7px;">
                                <a class="button-a button-a-second" href="{{ @$url }}" style="border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 7px;">
                                    Validar Conta
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1; color: #555555;">
                    <p class="text-align-sd text-size-mobile">Se você não criou uma conta, nenhuma ação adicional será necessária.</p>
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection
