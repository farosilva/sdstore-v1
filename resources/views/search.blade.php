@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Resultados da Busca</h1>
            </div>
        </div>
        <div class="row mt-3">
            @if ($products->count() > 0)
                <div class="col-12 mb-3">
                    <h5 class="text-center">Resultado da busca por <span class="font-panton-bold text-second">"{{ request()->search }}"</span></h5>
                </div>
            @endif
            @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                    @include('components.grids.product-vertical', ['product' => $product])
                </div>
            @empty
                <div class="col-12 my-3">
                    <h5 class="text-center">Não há resultados para <span class="font-panton-bold text-second">"{{ request()->search }}"</span></h5>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('products') }}" class="btn btn-first mt-3 text-center">
                        <i class="mdi mdi-view-grid mr-2"></i>
                        Conheça Nossos Produtos
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
