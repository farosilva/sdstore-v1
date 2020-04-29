@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <div class="cart-empty-content mt-3">
                    <i class="cart-empty-icon mdi mdi-cart-off m-0"></i>
                </div>
                <h3 class="mt-3 font-weight-bold">Seu carrinho expirou!</h3>
                <p>Veja nossos produtos e finalize um pedido.</p>
                <a href="{{ route('products') }}" class="btn btn-lg btn-first">
                    <i class="mdi mdi-view-grid mr-2"></i>
                    Ver Produtos
                </a>
            </div>
        </div>
    </div>
@endsection
