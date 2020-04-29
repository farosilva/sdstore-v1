@php
use App\Http\Controllers\CartController;

    $cartControl = new CartController();
    $cartResume = collect($cartControl->cart())['resume'];
@endphp
<div class="cart-resume-content py-2 px-3 border rounded">
    <div class="d-flex justify-content-between mb-1">
        @if ($cartResume['num_items'] == 1)
            <p class="mb-0">1 item</p>
        @else
            <p class="mb-0">{{ $cartResume['num_items'] }} itens</p>
        @endif
        <p class="font-panton-bold mb-0">R$ {{ $cartResume['subtotal'] }}</p>
    </div>
    <div class="d-flex justify-content-between mb-1">
        <p class="mb-0">Frete Promocional</p>
        <p class="font-panton-bold mb-0">R$ {{ $cartResume['frete'] }}</p>
    </div>
    <div class="d-flex justify-content-between mb-1">
        <p class="mb-0">Taxas</p>
        <p class="font-panton-bold mb-0">R$ 0,00</p>
    </div>
    <div class="d-flex justify-content-between mb-1">
        <p class="mb-0 font-panton-bold">Total</p>
        <p class="font-panton-bold text-second mb-0">R$ {{ $cartResume['total'] }}</p>
    </div>
    @if (Request::route()->getName() !== 'checkout' && str_replace(',', '.', $cartResume['subtotal']) > 79.99 )
        <hr>
        <div class="d-flex justify-content-center">
            <a href="{{ route('checkout') }}"
                onclick="event.preventDefault();
                document.getElementById('checkout-cart-form').submit();"
                class="btn btn-second rounded">Fechar Pedido</a>
            <form id="checkout-cart-form" action="{{ route('checkout') }}" method="POST">
                @csrf
            </form>
        </div>
    @endif
    @if (str_replace(',', '.', $cartResume['subtotal']) < 80 )
        <p class="py-2 mb-0 text-center">
            Faltam <span class="font-panton-bold">{{ formatMoney(80 - str_replace(',', '.', $cartResume['subtotal'])) }}</span> para fechar seu pedido
        </p>
    @endif
</div>
