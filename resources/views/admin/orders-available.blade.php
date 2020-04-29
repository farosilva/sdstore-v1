@extends('layouts.app')

@section('content')
    <div class="container-xl mt-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <x-navbar-admin link="1"></x-navbar-admin>
            </div>
            <div class="col-9">
                @if (session('message'))
                    <x-alert type="success">
                        {{ session('message') }}
                    </x-alert>
                @endif

                <form action="{{ route('admin.orders-delivery') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="bg-light">
                                <tr class="text-center">
                                    <th class="border-bottom-0" scope="col"></th>
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
                                        <td>
                                            <div class="custom-control custom-checkbox form-sd">
                                                <input type="checkbox" class="custom-control-input" name="{{ $order->order_ref }}" id="checkboxOrder{{ $loop->iteration }}">
                                                <label class="custom-control-label" for="checkboxOrder{{ $loop->iteration }}"></label>
                                            </div>
                                        </td>
                                        <th scope="row">{{ $order->order_ref }}</th>
                                        <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ formatMoney($order->value) }}</td>
                                        <td>{{ $order->user->short_name }}</td>
                                        <td>{{ $order->payment->infos->last()->status_label }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders-show', ['order' => $order->order_ref]) }}" class="btn btn-sm py-0 px-1 btn-second no-focus">
                                                <i class="mdi mdi-magnify"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-first">
                            <i class="mdi mdi-send mr-2"></i>
                            Notificar Entrega
                        </button>
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <p>{{ @$orders->links() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
