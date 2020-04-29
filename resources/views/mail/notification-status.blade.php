@extends('mail.layouts.base')

@section('title')
    Acompanhe seu pedido
@endsection

@section('content')
<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table class="bg-second" style="background: #f36f21" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="text-align: left; font-family: sans-serif; margin: auto; padding: 20px; font-size: 18px; ">
                    <p class="text-align-sd" style="margin: 0; color: #ffffff; font-size: 18px;">Pedido: {{ $info->payment->order->order_ref }}</p>
                </td>
            </tr>
        </table>
        <table style="background: #f8faea;" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p class="text-align-sd">
                        <b>Data do Pedido: </b>
                        {{ $info->payment->order->order_date->format('d/m/Y') }}
                    </p>
                    <p class="text-align-sd">
                        <b>Status Pedido: </b>
                        {{ $info->payment->order->status_label }}
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

@if ($info->payment->order->status == 'P' or $info->payment->order->status == 'F')
<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    @if($info->status == '3' && $info->payment->order->status == 'P')
                        <p class="text-align-sd">
                            <b>Status da Entrega: </b>
                            Preparando sua entrega
                        </p>
                    @endif
                    @if($info->status == '3' && $info->payment->order->status == 'F')
                        <p class="text-align-sd">
                            <b>Status da Entrega: </b>
                            Saiu para a entrega
                        </p>
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
                <td class="button-td button-td-first" style="border-radius: 7px;"></td>
            </tr>
        </table>
    </td>
</tr>
@endif

<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <p class="text-align-sd">
                        <b>Forma de Pagamento: </b>
                        {{ $info->payment->payment_label }}
                    </p>
                    <p class="text-align-sd">
                        <b>Status Pagamento: </b>
                        {{ $info->status_label }}
                    </p>
                    <p class="text-align-sd">
                        <b>Data: </b>
                        {{ $info->notification_date->format('d/m/Y H:i:s') }}
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

@switch($info->status)
    @case(4)
        <tr class="bg-first-light" style="background: #f8faea;">
            <td class="border-radius box-shadow">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                            <p class="text-align-sd">
                                <b>{{ $info->status_label }}: </b>
                                A transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta. Este status indica que o valor da transação está disponível para saque.
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
        @break
    @case(5)
        <tr class="bg-first-light" style="background: #f8faea;">
            <td class="border-radius box-shadow">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                            <p class="text-align-sd">
                                <b>{{ $info->status_label }}: </b>
                                O comprador, dentro do prazo de liberação da transação, abriu uma disputa. A disputa é um processo iniciado pelo comprador para indicar que não recebeu o produto ou serviço adquirido, ou que o mesmo foi entregue com problemas. Este é um mecanismo de segurança oferecido pelo PagSeguro. A equipe do PagSeguro é responsável por mediar a resolução de todas as disputas, quando solicitado pelo comprador. Para mais informações, veja a página de <a href="https://pagseguro.uol.com.br/para_voce/como_funciona_a_disputa.jhtml?_ga=2.216748182.1031733929.1586568581-1624857415.1585544610">explicação sobre disputas</a>.
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
        @break
    @case(6)
        <tr class="bg-first-light" style="background: #f8faea;">
            <td class="border-radius box-shadow">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                            <p class="text-align-sd">
                                <b>{{ $info->status_label }}: </b>
                                O *valor da transação foi devolvido para o comprador. Se você não possui mais o produto vendido em estoque, ou não pode por alguma razão prestar o serviço contratado, você pode devolver o valor da transação para o comprador. Esta também é a ação tomada quando uma disputa é resolvida em favor do comprador. Transações neste status não afetam o seu saldo no PagSeguro, pois não são nem um crédito e nem um débito.
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
        @break
    @case(8)
        <tr class="bg-first-light" style="background: #f8faea;">
            <td class="border-radius box-shadow">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                            <p class="text-align-sd">
                                <b>{{ $info->status_label }}: </b>
                                A valor da transação foi devolvido para o comprador.
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
        @break
    @case(9)
        <tr class="bg-first-light" style="background: #f8faea;">
            <td class="border-radius box-shadow">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="padding: 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                            <p class="text-align-sd">
                                <b>{{ $info->status_label }}: </b>
                                O comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito.
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
        @break
@endswitch

<tr class="bg-first-light" style="background: #f8faea;">
    <td class="border-radius box-shadow">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="padding: 10px 20px 0 20px; font-family: sans-serif; font-size: 15px; line-height: 1.2; color: #555555;">
                    <table style="width: 100%; position: relative;">
                        <tr style="border-bottom: solid 1px #ccc;">
                            <td style="padding: 5px 0 5px 0; width:50%;"><b>Produto</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:10%;"><b>Qtde</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:15%;"><b>Valor</b></td>
                            <td style="padding: 5px 0 5px 0; text-align: center; width:15%;"><b>Total</b></td>
                        </tr>
                        @foreach ($info->payment->order->items as $item)
                            <tr style="border-bottom: solid 1px #ccc">
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
                        {{ formatMoney($info->payment->order->value) }}
                    </p>
                    <p style="margin: 5px 0;" class="text-align-sd">
                        <b>Frete: </b>
                        {{ formatMoney($info->payment->order->shipping) }}
                    </p>
                    <p style="margin: 5px 0;" class="text-align-sd">
                        <b>Taxas: </b>
                        {{ formatMoney($info->payment->order->taxes) }}
                    </p>
                    <p style="margin: 5px 0 5px 0; color: #f36f21" class="text-align-sd">
                        <b>
                            Total:
                            <span >{{ formatMoney($info->payment->order->total) }}</span>
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
                        {{ $info->payment->order->delivery_address->address_name }} <br>
                        {{ $info->payment->order->delivery_address->street_name.', '.$info->payment->order->delivery_address->number.' '.$info->payment->order->delivery_address->complem }} <br>
                        {{ $info->payment->order->delivery_address->district.', '.mask($info->payment->order->delivery_address->post_code, '#####-###') }} <br>
                        {{ $info->payment->order->delivery_address->city.' - '.$info->payment->order->delivery_address->state }}
                    </p>
                    @if ($info->payment->order->comments)
                        <p class="text-align-sd">
                            <b>Observação: </b>
                            {{ $info->payment->order->comments }}
                        </p>
                    @endif
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection
