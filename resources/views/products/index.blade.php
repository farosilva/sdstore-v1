@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Produtos</h1>
            </div>
            @forelse ($products as $category => $product)
                <div class="col-12 mb-5">
                    <h3 class="border-bottom">
                        <i class="mdi mdi-star mr-2 text-first"></i>
                        {{ $category }}
                    </h3>
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                                @include('components.grids.product-vertical', ['product' => $item])
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
