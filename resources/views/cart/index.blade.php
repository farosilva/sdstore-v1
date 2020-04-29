@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@php
    use App\Models\ProductVariant;
@endphp

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Carrinho</h1>
            </div>
        </div>
        <div class="row">
            @if ($items->count())
                <div class="col-12 col-md-10 mx-auto col-lg-8">
                    <div class="cart-items-content rounded">
                        @foreach ($items as $item)
                            <div class="cart-items py-2 mb-2 border rounded d-flex">
                                <div class="cart-image px-2" style="height: 9rem;">
                                    <a href="{{ route('product', ['product' => $item->model->name_link]) }}">
                                        <v-lazy-image
                                            class="h-100 rounded border"
                                            src="{{ asset('images/products/small/'.$item->model->default_image) }}"
                                            src-placeholder="{{ asset('images/addons/loading-2.gif') }}"
                                            alt="{{ $item->name }}"
                                        ></v-lazy-image>
                                    </a>
                                </div>
                                <div class="cart-info d-flex flex-column justify-content-between w-100 pr-2">
                                    <div class="cart-info-text">
                                        <p class="font-weight-bold mb-0">{{ $item->name }}</p>
                                        <p class="font-size-minus text-muted mb-0">{{ $item->model->package_label }}</p>
                                        <p class="font-size-plus font-panton-bold text-second mb-0 py-1">{{ formatMoney($item->price) }}</p>
                                        @if ($item->model->stocks->quantity < $item->qty)
                                            @if ($item->model->stocks->quantity > 0)
                                                <small class="font-panton-bold text-danger">Temos {{ $item->model->stocks->quantity }} em estoque</small>
                                            @else
                                                <small class="font-panton-bold text-danger">Produto Indisponível</small>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="cart-info-action d-flex align-items-center justify-content-between">
                                        @if ($item->model->stocks->in_stock)
                                            <form action="{{ route('cart.update', ['sku' => $item->id, 'rowId' => $item->rowId]) }}" method="POST" class="d-flex">
                                                @csrf
                                                <input-cart-quantity qtde="{{ $item->qty }}" class="input-cart-qu"></input-cart-quantity>
                                                <button class="btn btn-sm btn-first ml-2 rounded-pill px-3">
                                                    <i class="mdi mdi-pencil mr-2"></i>
                                                    <span class="d-none d-sm-inline-block">Alterar</span>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('cart.delete', ['sku' => $item->id, 'rowId' => $item->rowId]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-danger ml-2 rounded-pill px-3">
                                                <i class="mdi mdi-delete mr-2"></i>
                                                <span class="d-none d-sm-inline-block">Excluir</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-6 mx-auto col-lg-4">
                    @include('components.cart.resume')
                </div>
            @else
                <div class="col-12">
                    <h5 class="text-muted py-3">Não há itens no carrinho</h5>
                    <a class="btn btn-second" href="{{ route('home') }}">
                        <i class="mdi mdi-home mr-2"></i>
                        Home
                    </a>
                    <a class="btn btn-first" href="{{ route('products') }}">
                        <i class="mdi mdi-view-grid mr-2"></i>
                        Ver Produtos
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
