@extends('mail.layouts.base')

@section('title')
    Nova mensagem do site
@endsection

@section('content')
<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p class="text-align-sd"><b>Nome:</b> {{ @$contact_name }}</p>
                    <p class="text-align-sd"><b>Telefone:</b> {{ @$contact_phone }}</p>
                    <p class="text-align-sd"><b>E-mail:</b> {{ @$contact_email }}</p>
                    <p class="text-align-sd"><b>Mensagem:</b> {{ @$contact_mensagem }}</p>
                    <p class="text-align-sd"><small>Enviado em {{ now()->format('d/m/Y').' às '.now()->format('H:i') }}</small></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection
