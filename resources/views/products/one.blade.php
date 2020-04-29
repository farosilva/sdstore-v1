@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-6">
                <div class="product-image-content">
                    @if ($product->images->count() == 1)
                        <v-lazy-image
                            class="img-fluid rounded"
                            src="/images/products/large/{{ $product->default_image }}"
                            src-placeholder="/images/addons/loading-2.gif"
                            alt="{{ $product->name }}"/>
                    @else
                        <product-images-carousel
                            src-images="{{ $product->images->pluck('directory') }}"
                        ></product-images-carousel>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6 mt-4 mt-md-0">
                <div class="product-informations-content d-flex flex-column p-3 border h-100 rounded">
                    <div class="product-name">
                        <h3 class="font-weight-bold text-second mb-0">{{ $product->name }}</h3>
                    </div>
                    <div class="product-description-label d-flex justify-content-between">
                        <div class="product-qtde-package">
                            <p class="text-muted mb-0">{{ $product->sku }}</p>
                        </div>
                        <div class="product-stock text-right">
                            @if ($product->stocks->avaiable)
                                <h5 class="m-0"><span class="badge badge-success">Em estoque</span></h5>
                                @if ($product->stocks->quantity_avaiable <= 10)
                                    <small class="font-panton-bold text-danger">Restam apenas {{ $product->stocks->quantity_avaiable }} unidade(s)</small>
                                @endif
                            @else
                                <h5><span class="badge badge-danger">Indisponível</span></h5>
                            @endif
                        </div>
                    </div>
                    <div class="product-price d-flex align-items-center my-2">
                        <p class="current-price font-weight-bold mb-0">{{ formatMoney( $product->current_price ) }}</p>
                    </div>
                    @if ($product->marketing_description)
                        <div class="product-description-marketing py-4 border-bottom border-top">
                            <p class="text-justify m-0">{{ $product->marketing_description }}</p>
                        </div>
                    @endif
                    <div class="product-variants">
                        @php
                            $variants = $product->products->variants->where('status','A');//->loadMissing('stocks');
                            $variants = $variants->map(function($item, $key){
                                return [
                                    'sku'           => $item->sku,
                                    'name'          => $item->name,
                                    'package_label' => $item->package_label,
                                    'avaiable'      => $item->stocks->avaiable
                                ];
                            })
                        @endphp
                        <p class="mt-3 font-weight-bold">Embalagens:</p>
                        <div class="form-row">
                            <div class="form-group">
                                <product-variants-widget
                                    sku="{{ $product->sku }}"
                                    variants="{{ $variants }}"
                                ></product-variants-widget>
                            </div>
                        </div>
                    </div>
                    @if ($product->stocks->avaiable)
                        <form action="{{ route('cart.add') }}" class="mt-3" method="POST">
                            @csrf
                            <input type="hidden" name="sku" value="{{ $product->sku }}">
                            <div class="form-row">
                                <div class="col-4 col-sm-3 col-md-4">
                                    <input-cart-quantity></input-cart-quantity>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn flex-grow-1 btn-first no-focus rounded-pill">
                                        <i class="mdi mdi-cart"></i>
                                        Adicionar ao Carrinho
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- <input-cart-quantity sku="{{ $product->sku }}" size="large" :add-cart-button="true" class="mt-4"></input-cart-quantity> --}}
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light my-5">
        <div class="container-xl">
            <div class="row py-5">
                <div class="col-12 border bg-white rounded pt-5">
                    <ul class="product-information-nav nav nav-tabs justify-content-center" id="informationTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descrição</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Detalhes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comentários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none" id="preparation-tab" data-toggle="tab" href="#preparation" role="tab" aria-controls="preparation" aria-selected="false">Modo de Preparo</a>
                        </li>
                    </ul>
                    <div class="product-information-tab tab-content px-3 py-4" id="informationTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <p>{{ $product->technical_description }}</p>
                        </div>
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Produto</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->name.' '.$product->weight_custom }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Categoria</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->category_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Grupo</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->subcategory_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Embalagem</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->infos->packages->name_alt }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Peso Liquido</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->infos->weight.$product->infos->unit }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Quantidade</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->infos->qtde_pack }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">Peso Unidade</span>
                                </div>
                                <div class="col-6 px-1">
                                    <p class="alert alert-secondary py-2 m-0">{{ $product->weight_by_unit }}</span>
                                </div>
                            </div>
                            @if ($product->infos->qtde_pack > 0)
                                <small>*Valores aproximados</small>
                            @endif
                        </div>
                        <div class="tab-pane fade d-none" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        </div>
                        <div class="tab-pane fade d-none" id="preparation" role="tabpanel" aria-labelledby="preparation-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $products_cat = $product->subcategories->categories->products->where('product_id', '<>', $product->product_id);
    @endphp

    @if (@$products_cat->count() > 0)
        <div class="container-xl">
            <div class="row mt-3">
                <div class="col-12 py-3">
                    <h1 class="page-title text-center text-second">Você também pode gostar</h1>
                </div>
            </div>
            <div class="row mt-3">
                @foreach (@$products_cat as $product_cat)
                    <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                        @include('components.grids.product-vertical', ['product' => $product_cat])
                    </div>
                @endforeach
            </div>
            <div class="row mt-3 d-none">
                @foreach (@$products_cat as $product_cat)
                    <div class="col-6 col-md-4 col-lg-3 d-flex py-3">
                        <product-vertical-grid
                            src-image="{{ $product_cat->default_image }}"
                            product-code="{{ $product_cat->sku }}"
                            product-name="{{ $product_cat->name }}"
                            product-description="{{ $product_cat->package_label }}"
                            :current-price="{{ $product_cat->current_price }}"
                        ></product-vertical-grid>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
