@extends('layouts.app')

@section('content')

    <section class="banner-main">
        <div class="container-fluid px-0">
            <home-carousel></home-carousel>
        </div>
    </section>

    <section class="cards-home mt-5">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 col-md-4 mb-2 d-flex align-items-center">
                    <div class="card-home-icon mr-3">
                        <i class="mdi mdi-truck-fast-outline m-0"></i>
                    </div>
                    <div class="card-home-text">
                        <h6 class="font-weight-bold text-uppercase">Frete Promocional</h6>
                        <p>Faça seu pedido a partir de R$ 80 e aproveite nosso frete promocional.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2 d-flex align-items-center">
                    <div class="card-home-icon mr-3">
                        <i class="mdi mdi-headset m-0"></i>
                    </div>
                    <div class="card-home-text">
                        <h6 class="font-weight-bold text-uppercase">Atendimento Comercial</h6>
                        <p>Contate-nos de segunda a sexta das 8h às 18h.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2 d-flex align-items-center">
                    <div class="card-home-icon mr-3">
                        <i class="mdi mdi-lock-outline m-0"></i>
                    </div>
                    <div class="card-home-text">
                        <h6 class="font-weight-bold text-uppercase">Pagamento 100% Seguro</h6>
                        <p>Garantimos a segurança dos seus dados com a PagSeguro®.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @inject('products', 'App\Http\Controllers\ProductController')

    @if (session('cart.success'))
        {{-- <alert-widget
            title="Incluído com sucesso"
            icon="success"
        ></alert-widget> --}}
    @endif

    @if ($products->getFeatured()->count())
        <section class="products-featured mt-3 mb-5">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 py-3">
                        <h1 class="page-title text-center font-sidney">Em Destaque</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products->getFeatured() as $product)
                        <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                            @include('components.grids.product-vertical', ['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    {{-- {{ $products->getFeatured() }} --}}

    {{-- @if ($products->getFeatured()->count())
        <section class="products-featured mt-3 mb-5">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 py-3">
                        <h1 class="page-title text-center font-sidney">Em Destaque</h1>
                    </div>
                    @foreach ($products->getFeatured() as $product)
                        <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                            <product-vertical-grid
                                src-image="{{ $product->default_image }}"
                                product-code="{{ $product->sku }}"
                                product-name="{{ $product->name }}"
                                product-description="{{ $product->package_label }}"
                                :current-price="{{ $product->current_price }}"
                            ></product-vertical-grid>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}
@endsection
