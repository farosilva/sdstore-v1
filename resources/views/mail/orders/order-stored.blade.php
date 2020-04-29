@extends('mail.layouts.base')

@section('title')
    Seu pedido foi criado
@endsection

@section('content')
<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p class="text-align-sd">Olá <b>{{ $order->user->short_name }}</b>!</p>
                    <p class="text-align-sd">Obrigado por comprar na Santo Dom! Trataremos seu pedido com todo carinho.</p>
                </td>
            </tr>
        </table>
        <table class="bg-second" style="background: #f36f21" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="text-align: left; font-family: sans-serif; margin: auto; padding: 20px; font-size: 18px; ">
                    <p class="text-align-sd" style="margin: 0; color: #ffffff; font-size: 18px;">Pedido: {{ $order->order_ref }}</p>
                </td>
            </tr>
        </table>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    @if (@$transaction['paymentMethod']['type'] == 1)
                        <p class="text-align-sd">Para compras com cartão de crédito, a confirmação do pagamento pode levar até 2 dias, dependendo da sua operadora. Porém, normalmente, acontece em até 2 horas.</p> --}}
                    @endif
                    @if (@$transaction['paymentMethod']['type'] == 2)
                        <p class="text-align-sd">Para compras com boleto, a confirmação do pagamento pode levar até 3 dias.</p>
                    @endif
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td style="padding: 10px 20px;">
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
            <tr>
                <td class="button-td button-td-first" style="border-radius: 7px;">
                    <a class="button-a button-a-first" target="_blank" href="{{ $transaction['paymentLink'] }}" style="border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 7px;">
                        <b>Imprimir Boleto</b>
                    </a>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px 15px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <table style="width: 100%; position: relative;">
                        <tr style="border-bottom: solid 1px #ccc;">
                            <td style="padding: 5px 0 5px 0; width:50%;"><b>Produto</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:10%;"><b>Qtde</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:15%;"><b>Valor</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:15%;"><b>Total</b></td>
                        </tr>
                        @foreach ($order->items as $key => $item)
                            <tr @if($key > 0) style="border-top: solid 1px #ccc" @endif>
                                <td style="padding: 5px 0 5px 0; width:55%;">
                                    <a href="{{ route('product', ['product' => $item->product->name_link]) }}" style="color: #555555;">
                                        {{ $item->product->name_alt }}
                                    </a>
                                </td>
                                <td style="padding: 5px 0 5px 0; text-align: center; width:15%; color: #555555;">{{ $item->quantity }}</td>
                                <td style="padding: 5px 0 5px 0; text-align: center; width:15%; color: #555555;">{{ formatMoney($item->price_sale) }}</td>
                                <td style="padding: 5px 0 5px 0; text-align: center; width:15%; color: #555555;">{{ formatMoney($item->subtotal) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td style="padding: 10px 20px;">
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
            <tr>
                <td class="button-td button-td-first" style="border-radius: 7px;"></td>
            </tr>
        </table>
    </td>
</tr>

<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 0px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p style="margin: 15px 0 5px 0;" class="text-align-sd">
                        <b>Subtotal: </b>
                        {{ formatMoney($order->value) }}
                    </p>
                    <p style="margin: 5px 0;" class="text-align-sd">
                        <b>Frete: </b>
                        {{ formatMoney($order->shipping) }}
                    </p>
                    <p style="margin: 5px 0;" class="text-align-sd">
                        <b>Taxas: </b>
                        {{ formatMoney($order->taxes) }}
                    </p>
                    <p style="margin: 5px 0 5px 0; color: #f36f21" class="text-align-sd">
                        <b>
                            Total: 
                            <span >{{ formatMoney($order->total) }}</span>
                        </b>
                    </p>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td style="padding: 10px 20px;">
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
            <tr>
                <td class="button-td button-td-first" style="border-radius: 7px;"></td>
            </tr>
        </table>
    </td>
</tr>

<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p class="text-align-sd">
                        <b>Endereço de entrega</b><br>
                    </p>
                    <p class="text-align-sd">
                        {{ $order->delivery_address->address_name }} <br>
                        {{ $order->delivery_address->street_name.', '.$order->delivery_address->number.' '.$order->delivery_address->complem }} <br>
                        {{ $order->delivery_address->district.', '.mask($order->delivery_address->post_code, '#####-###') }} <br>
                        {{ $order->delivery_address->city.' - '.$order->delivery_address->state }}
                    </p>
                    @if ($order->comments)
                        <p class="text-align-sd">
                            <b>Observação: </b>
                            {{ $order->comments }}
                        </p>
                    @endif
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection