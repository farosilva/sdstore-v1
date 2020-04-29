@extends('layouts.app')

@section('content')
    <div class="container-xl mt-4">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Recebemos seu Pedido :)</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-sm-10">
                <h5 class="text-center">Está quase tudo pronto!</h5>
                <div class="mt-4 border-bottom px-2 pb-2">
                    <p class="m-0">
                        <span class="font-panton-bold">Nº Pedido: </span>
                        {{ $order->order_ref }}
                    </p>
                    <p class="m-0">
                        <span class="font-panton-bold">Realizado em: </span>
                        {{ $order->payment->transaction_date->format('d/m/Y H:i:s') }}
                    </p>
                    <p class="m-0">
                        <span class="font-panton-bold">Pagamento via: </span>
                        {{ $order->payment->payment_label }}
                    </p>
                    <p class="m-0">
                        <span class="font-panton-bold">Valor do Pedido: </span>
                        {{ formatMoney($transaction['grossAmount']) }}
                    </p>
                    <p class="m-0">
                        <span class="font-panton-bold">Status: </span>
                        {{ ($order->payment->infos->last()->status_label) ?? 'Processando' }}
                    </p>
                    <p class="m-0">
                        <span class="font-panton-bold">Data de Entrega: </span>
                        *1 dia útil
                    </p>
                    @if ($order->payment->payment_type == 2)
                        <a href="{{ $transaction['paymentLink'] }}" target="_blank" class="btn btn-first xbtn-sm my-2">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-barcode h5 mb-0 mr-2"></i>
                                Imprimir Boleto
                            </div>
                        </a>
                    @endif
                    <p class="small m-0">*A entrega será confirmada após a compensação do pagamento</p>
                </div>
            </div>
            <div class="col-12 col-sm-10">
                <div class="mt-4 mb-3">
                    <h2 class="text-secondary text-center font-sidney">Meu Pedido</h2>
                </div>
            </div>
            <div class="col-12 col-sm-10">
                <ul class="nav flex-column">
                    @foreach ($order->items as $key => $item)
                        <li class="@if($key > 0) mt-2 pt-2 border-top @endif">
                            <div class="order-items">
                                <div class="row">
                                    <div class="col-3 col-md-2 d-flex m-auto">
                                        <div class="order-items-image d-flex m-auto">
                                            <img style="width: 6rem;" src="{{ asset('images/products/small/'.$item->product->default_image) }}" class="h-100 border rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row align-items-center h-100">
                                            <div class="col-8 col-md-6 d-flex flex-column">
                                                <span class="font-panton-bold text-second">
                                                    {{ $item->product->name_alt }}
                                                </span>
                                                <span class="text-muted font-size-minus">
                                                    {{ $item->sku }}
                                                </span>
                                                <span class="text-muted font-size-minus">
                                                    {{ $item->product->package_label }}
                                                </span>
                                            </div>
                                            <div class="col-4 col-md-6">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 d-flex justify-content-end justify-content-md-start">
                                                        <span class="font-weight-bold text-secondary">{{ $item->quantity }}x</span>
                                                        <span class="font-weight-bold text-secondary ml-2">{{ formatMoney($item->price_sale) }}</span>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex justify-content-end justify-content-md-start">
                                                        <span class="font-panton-bold">{{ formatMoney($item->subtotal) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-sm-10 mt-3">
                <div class="row">
                    <div class="offset-1 offset-md-2 col">
                        <div class="row align-items-center h-100">
                            <div class="offset-2 offset-md-6 col-10 col-md-6">
                                <div class="row mb-1">
                                    <div class="col-6">
                                        <span class="font-weight-bold text-secondary ml-2">Subtotal:</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end justify-content-md-start">
                                        <span class="font-panton-bold">{{ formatMoney($order->value) }}</span>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        <span class="font-weight-bold text-secondary ml-2">Frete:</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end justify-content-md-start">
                                        <span class="font-panton-bold">{{ formatMoney($order->shipping) }}</span>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        <span class="font-weight-bold text-secondary ml-2">Taxas:</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end justify-content-md-start">
                                        <span class="font-panton-bold">{{ formatMoney($order->taxes) }}</span>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        <span class="font-weight-bold text-secondary ml-2">Total:</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end justify-content-md-start">
                                        <span class="font-panton-bold text-second">{{ formatMoney($order->total) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-12 offset-md-7 p-0 col-md mt-4 mt-md-2 d-flex justify-content-center justify-content-md-start">
                <a href="{{ route('my-account.orders') }}" class="btn btn-first">
                    <i class="mdi mdi-receipt mr-2"></i>
                    Meus Pedidos
                </a>
            </div>
        </div>
    </div>
@endsection
