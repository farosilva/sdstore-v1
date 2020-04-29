@extends('layouts.app')

@if (!@$admin)
    @section('breadcrumb')
        <x-breadcrumb></x-breadcrumb>
    @endsection
@endif

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Detalhes do Pedido</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="border rounded mb-3 p-3 shadow-sm">
                    <p class="m-0">
                        Pedido <span class="font-weight-bold">{{ @$order->order_ref }}</span>
                        realizado em {{ @$order->order_date->format('d/m/Y') }}
                    </p>
                </div>
            </div>
            @if (@$admin)
                <div class="col-12">
                    <div class="border rounded mb-3 p-3 shadow-sm">
                        <p class="m-0">
                            <span class="font-weight-bold">Cliente:</span>
                            {{ @$order->user->full_name }}
                        </p>
                        <p class="m-0">
                            <span class="font-weight-bold">CPF:</span>
                            {{ mask(@$order->user->cpf_cnpj, '###.###.###-##') }}
                        </p>
                        <p class="m-0">
                            <span class="font-weight-bold">Telefone:</span>
                            {{ formatPhone(@$order->user->contacts->first()->phone_1, '###.###.###-##') }}
                        </p>
                        <p class="m-0">
                            <span class="font-weight-bold">E-mail:</span>
                            {{ @$order->user->email }}
                        </p>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="border rounded mb-3 p-3 shadow-sm">
                    <p class="m-0">
                        <span class="font-weight-bold">Forma de Pagamento: </span>
                        {{ @$order->payment->payment_label }}
                    </p>
                    @if ( @$order->payment->payment_type && @$order->payment->infos->last()->status == 1)
                        <a href="{{ @$order->payment->infos->last()->payment_link }}" class="btn btn-sm btn-first mt-2">
                            <i class="mdi mdi-barcode mr-2"></i>
                            Imprimir boleto
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="border rounded mb-3 p-3 shadow-sm">
                    <p class="font-panton-bold">Status do pedido</p>

                    <div class="orders-status d-md-none">
                        <div class="orders-status-step border-bottom pb-2 mb-2">
                            <p class="font-weight-bold m-0">{{ @$order->created_at->format('d/m/Y H:i:s') }}</p>
                            <p class="m-0">Pedido Emitido</p>
                        </div>
                        @foreach (@$order->payment->infos as $info)
                            <div class="orders-status-step border-bottom pb-2 mb-2">
                                <p class="font-weight-bold m-0">{{ $info->notification_date->format('d/m/Y H:i:s') }}</p>
                                <p class="m-0">{{ $info->status_label }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="table-responsive rounded border d-none d-md-block">
                        <table class="table table-hover border-0 m-0">
                            <thead class="border-0 border-leftborder-right">
                                <tr class="bg-light text-dark font-panton-bold">
                                    <th class="border-0" scope="col">Data</th>
                                    <th class="border-0" class="w-100" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><p class="m-0" style="white-space: pre;">{{ @$order->created_at->format('d/m/Y H:i:s') }}</p></th>
                                    <th class="w-100" scope="row">Pedido emitido</th>
                                </tr>
                                @foreach ( @$order->payment->infos as $info)
                                    <tr>
                                        <th scope="row"><p class="m-0" style="white-space: pre;">{{ $info->notification_date->format('d/m/Y H:i:s') }}</p></th>
                                        <th class="w-100" scope="row">{{ $info->status_label }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="border rounded mb-3 p-3 shadow-sm">
                    <p class="font-panton-bold">Endereço de entrega</p>

                    <p class="font-weight-bold mb-0">{{  @$order->delivery_address->address_name }}</p>
                    <p class="mb-0">{{ @$order->delivery_address->street_name.', '.@$order->delivery_address->number.' '.@$order->delivery_address->complem }}</p>
                    <p class="mb-0">{{ @$order->delivery_address->district.', '.mask(@$order->delivery_address->post_code, '#####-###') }}</p>
                    <p class="mb-0">{{ @$order->delivery_address->city.' - '.@$order->delivery_address->state }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="border rounded mb-3 p-3 shadow-sm">
                    <p class="font-panton-bold">Endereço de cobrança</p>

                    <p class="font-weight-bold mb-0">{{ @$order->invoice_address->address_name }}</p>
                    <p class="mb-0">{{ @$order->invoice_address->street_name.', '.@$order->invoice_address->number.' '.@$order->invoice_address->complem }}</p>
                    <p class="mb-0">{{ @$order->invoice_address->district.', '.mask(@$order->invoice_address->post_code, '#####-###') }}</p>
                    <p class="mb-0">{{ @$order->invoice_address->city.' - '.@$order->invoice_address->state }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="border rounded mb-3 p-3 shadow-sm">

                    <div class="orders-items d-sm-none">
                        @foreach (@$order->items as $item)
                            <div class="orders-item border-bottom pb-2 mb-2 d-flex flex-column align-items-center">
                                <div class="order-item-image border rounded" style="width: 8rem;">
                                    <img src="{{ asset('images/products/small/'.$item->product->default_image) }}" class="w-100" alt="">
                                </div>
                                <div class="order-item-name">
                                    <p class="m-0 font-weight-bold text-second">{{ $item->product->name_alt }}</p>
                                </div>
                                <div class="order-item-info w-100 d-flex justify-content-between mt-2">
                                    <p class="m-0">{{ formatMoney($item->price_sale) }}</p>
                                    <p class="m-0">{{ $item->quantity }}</p>
                                    <p class="m-0">{{ formatMoney($item->subtotal) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="table-responsive rounded border d-none d-sm-block">
                        <table class="table table-hover border-0 m-0">
                            <thead class="border-0">
                                <tr class="bg-light text-dark font-panton-bold">
                                    <th class="border-0" class="w-100" scope="col">Produto</th>
                                    <th class="border-0" scope="col">
                                        <p class="text-center m-0">Quantidade</p>
                                    </th>
                                    <th class="border-0" scope="col">
                                        <p class="text-center m-0">Valor</p>
                                    </th>
                                    <th class="border-0" scope="col">
                                        <p class="text-center m-0">Total</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$order->items as $item)
                                    <tr>
                                        <th class="w-100" scope="row">
                                            <a class="text-dark" href="{{ route('product', ['product' => $item->product->name_link]) }}">
                                                {{ $item->product->name_alt }}
                                            </a>
                                        </th>
                                        <th>
                                            <p class="text-center m-0" style="white-space: pre;">{{ $item->quantity }}</p>
                                        </th>
                                        <th>
                                            <p class="text-center m-0" style="white-space: pre;">{{ formatMoney($item->price_sale) }}</p>
                                        </th>
                                        <th>
                                            <p class="text-center m-0" style="white-space: pre;">{{ formatMoney($item->subtotal) }}</p>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="orders-subtotal mt-3">
                        <div class="row">
                            <div class="offset-0 offset-sm-6 offset-md-7 offset-lg-9 col">
                                <div class="row mb-1">
                                    <div class="col-6 font-weight-bold">Subtotal: </div>
                                    <div class="col-6 font-panton-bold text-right">{{ formatMoney(@$order->value) }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 font-weight-bold">Frete: </div>
                                    <div class="col-6 font-panton-bold text-right">{{ formatMoney(@$order->shipping) }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 font-weight-bold">Taxas: </div>
                                    <div class="col-6 font-panton-bold text-right">{{ formatMoney(@$order->taxes) }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 font-weight-bold">Total: </div>
                                    <div class="col-6 font-panton-bold text-right text-second">{{ formatMoney(@$order->total) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!@$admin)
            <div class="row">
                <div class="form-group col-12 mt-2">
                    <a href="{{ route('my-account.orders') }}" class="btn btn-dark btn-sm">
                        <i class="mdi mdi-receipt mr-2"></i>
                        Meus Pedidos
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-first btn-sm">
                        <i class="mdi mdi-home mr-2"></i>
                        Home
                    </a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="form-group col-12 mt-2">
                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">
                        <i class="mdi mdi-undo mr-2"></i>
                        Voltar
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
