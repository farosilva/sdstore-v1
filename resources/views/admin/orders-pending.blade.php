@extends('layouts.app')

@section('content')
    <div class="container-xl mt-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <x-navbar-admin link="2"></x-navbar-admin>
            </div>
            <div class="col-9">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th class="border-bottom-0" scope="col">Pedido</th>
                                <th class="border-bottom-0" scope="col">Data</th>
                                <th class="border-bottom-0" scope="col">Total</th>
                                <th class="border-bottom-0" scope="col">Cliente</th>
                                <th class="border-bottom-0" scope="col">Status</th>
                                <th class="border-bottom-0" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <th scope="row">{{ $order->order_ref }}</th>
                                    <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ formatMoney($order->value) }}</td>
                                    <td>{{ $order->user->short_name }}</td>
                                    <td>{{ $order->payment->infos->last()->status_label }}</td>
                                    {{-- <td>
                                        <button class="btn btn-sm py-0 px-1 btn-first no-focus">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('admin.orders-show', ['order' => $order->order_ref]) }}" class="btn btn-sm py-0 px-1 btn-first no-focus">
                                            <i class="mdi mdi-magnify"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <p>{{ @$orders->links() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
