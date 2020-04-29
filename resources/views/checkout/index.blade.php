@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Checkout</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <div class="checkout-items-content border rounded mb-2">
                    <a href="{{ route('checkout') }}" class="text-decoration-none text-dark"
                        onclick="event.preventDefault();
                        document.getElementById('checkout-profile-form').submit();">
                        <h5 class="font-weight-bold mb-0 w-100 p-3 d-flex justify-content-between">
                            <div>
                                <span class="mr-4">1</span>
                                Dados Pessoais
                            </div>
                            @if ($section !== 'profile' && request()->session()->get('app.checkout.validate.profile'))
                                <div class="icon">
                                    <i class="mdi mdi-check text-success"></i>
                                </div>
                            @endif
                        </h5>
                    </a>
                    @if ($section  == 'profile' )
                        <div class="px-4">
                            @include('components.checkout.profile')
                        </div>
                    @else
                        <form id="checkout-profile-form" action="{{ route('checkout') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="section" value="profile">
                        </form>
                    @endif
                </div>
                <div class="checkout-items-content border rounded mb-2">
                    <a href="{{ route('checkout') }}" class="text-decoration-none text-dark"
                        onclick="event.preventDefault();
                        document.getElementById('checkout-address-form').submit();">
                        <h5 class="font-weight-bold mb-0 w-100 p-3 d-flex justify-content-between">
                            <div>
                                <span class="mr-4">2</span>
                                Endereço
                            </div>
                            @if ($section !== 'address' && request()->session()->get('app.checkout.validate.address'))
                                <div class="icon">
                                    <i class="mdi mdi-check text-success"></i>
                                </div>
                            @endif
                        </h5>
                    </a>
                    <form id="checkout-address-form" action="{{ route('checkout') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="section" value="address">
                    </form>
                    @if (@$section == 'address')
                        <div class="px-4">
                            @include('components.checkout.address')
                        </div>
                    @endif
                </div>
                <div class="checkout-items-content border rounded mb-2">
                    <a href="{{ route('checkout') }}" class="text-decoration-none text-dark"
                        onclick="event.preventDefault();
                        document.getElementById('checkout-delivery-form').submit();">
                        <h5 class="font-weight-bold mb-0 w-100 p-3 d-flex justify-content-between">
                            <div>
                                <span class="mr-4">3</span>
                                Entrega
                            </div>
                            @if ($section !== 'delivery' && request()->session()->get('app.checkout.validate.delivery'))
                                <div class="icon">
                                    <i class="mdi mdi-check text-success"></i>
                                </div>
                            @endif
                        </h5>
                    </a>
                    <form id="checkout-delivery-form" action="{{ route('checkout') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="section" value="delivery">
                    </form>
                    @if (@$section == 'delivery')
                        <div class="px-4">
                            @include('components.checkout.delivery')
                        </div>
                    @endif
                </div>
                <div class="checkout-items-content border rounded mb-2">
                    <a href="#" class="text-decoration-none text-dark"
                        onclick="event.preventDefault();
                        document.getElementById('checkout-payment-form').submit();">
                        <h5 class="font-weight-bold mb-0 w-100 p-3 d-flex justify-content-between">
                            <div>
                                <span class="mr-4">4</span>
                                Pagamento
                            </div>
                            @if ($section !== 'payment' && request()->session()->get('app.checkout.validate.payment'))
                                <div class="icon">
                                    <i class="mdi mdi-check text-success"></i>
                                </div>
                            @endif
                        </h5>
                    </a>
                    <form id="checkout-payment-form" action="{{ route('checkout') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="section" value="payment">
                    </form>
                    @if (@$section == 'payment')
                        <div class="px-1">
                            <div class="row">
                                <div class="col-12 py-2">
                                    @include('components.checkout.payment')
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
                @include('components.cart.resume')
            </div>
        </div>
    </div>
@endsection
