@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('contentx')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                {{ (auth()->user()->orders)->sortByDesc('order_id') }}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Meus Pedidos</h2>
            </div>
        </div>
        <div class="row mt-3">
            @if (auth()->user()->orders->count() > 0)
                <div class="col-12 mb-3">
                    <h5 class="font-size-plusx font-weightx-bold">Aqui estão seus pedidos realizados desde que criou uma conta.</h5>
                </div>
                <div class="orders mx-2 py-2 rounded border d-md-none w-100">
                    <div class="col-12">
                        @foreach ((auth()->user()->orders)->sortByDesc('order_id') as $key => $order)
                            <div class="row py-1">
                                <div class="col-9 border-right">
                                    <h5 class="font-weight-bold">{{ @$order->order_ref }}</h5>
                                    <p class="mb-0">{{ @$order->order_date->format('d/m/Y') }}</p>
                                    <p class="mb-0">{{ formatMoney(@$order->value) }}</p>
                                    <p class="mb-0">{{ @$order->payment->payment_label }}</p>
                                    <h5 class="mt-2 mb-0"><span class="badge badge-second"></span></h5 class="mt-2 mb-0">
                                </div>
                                <div class="col-3 d-flex align-items-center justify-content-center">
                                    <a href="{{ route('my-account.orders.order', ['order' => $order->order_ref]) }}" class="btn btn-lg rounded-circle no-focus">
                                        <i class="mdi mdi-magnify"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="table-responsive rounded border mx-2 d-none d-md-block">
                    <table class="table table-hover border-0 m-0">
                        <thead class="border-0 border-leftborder-right">
                            <tr class="text-center bg-light text-dark">
                                <th class="border-0" scope="col">Pedido</th>
                                <th class="border-0" scope="col">Data</th>
                                <th class="border-0" scope="col">Total</th>
                                <th class="border-0" scope="col">Pagamento</th>
                                <th class="border-0" scope="col">Status</th>
                                <th class="border-0" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ((auth()->user()->orders)->sortByDesc('order_id') as $order)
                                <tr class="text-center">
                                    <th scope="row">{{ $order->order_ref }}</th>
                                    <td>{{ $order->order_date->format('d/m/Y') }}</td>
                                    <td>{{ formatMoney($order->total) }}</td>
                                    <td class="flex-fill">{{ $order->payment->payment_label }}</td>
                                    <td>{{ ($order->payment->infos->last()->status_label) ?? 'Processando' }}</td>
                                    <td>
                                        <a href="{{ route('my-account.orders.order', ['order' => $order->order_ref]) }}" class="d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-magnify h4 m-0 text-dark"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-12">
                    <p>Você ainda não fez um pedido.</p>
                </div>
            @endif
            <div class="form-group col-12 mt-4">
                @if (auth()->user()->orders->count() == 0)
                    <a href="{{ route('products') }}" class="btn btn-first">
                        <i class="mdi mdi-apps mr-2"></i>
                        Faça um Pedido
                    </a>
                @endif
                <a href="{{ route('my-account') }}" class="btn btn-dark btn-sm">
                    <i class="mdi mdi-account-outline mr-2"></i>
                    Minha Conta
                </a>
            </div>
        </div>
    </div>
@endsection
