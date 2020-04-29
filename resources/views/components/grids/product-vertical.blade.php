<div class="product-vertical-grid border bg-white rounded mx-auto d-flex flex-column">
    <div class="product-vertical-top rounded-top d-flex justify-content-center align-items-center">
        <div class="product-vertical-image">
            <a href="{{ route('product', ['product' => $product->name_link]) }}" class="text-decoration-none">
                <v-lazy-image
                    class="img-fluid rounded-top"
                    src="{{ asset('images/products/small/'.$product->default_image) }}"
                    src-placeholder="{{ asset('images/addons/loading-2.gif') }}"
                    alt="productName">
                </v-lazy-image>
            </a>
        </div>
    </div>
    <div class="product-vertical-bottom">
        <div class="product-vertical-infos-content">
            <div class="product-name mb-1">
                <span class="text-second font-panton-bold">{{ $product->name }}</span>
            </div>
            <div class="product-info d-flex align-items-center justify-content-around">
                <div class="product-details-pack">
                    <p class="small m-0">{{ $product->package_label }}</p>
                </div>
            </div>
            <div class="product-price mb-1 mt-1">
                <p class="mb-0 price-new">{{ formatMoney($product->currentPrice) }}</p>
            </div>
            <div class="product-actions d-flex">
                <div class="product-actions-button w-100 d-flex justify-content-around align-items-center">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sku" value="{{ $product->sku }}">
                        <button type="submit" class="btn btn-sm btn-first no-focus rounded-pill">
                            <i class="mdi mdi-cart"></i>
                            Adicionar ao Carrinho
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
