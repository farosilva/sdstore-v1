@if (@$new_address || auth()->user()->addresses->count() == 0)
    <form action="{{ route('checkout.address.store') }}" method="POST" class="mt-3">
        @csrf

        @include('components.register.address-form')

        <div class="form-group">
            <button class="btn btn-first">
                <i class="mdi mdi-check mr-2"></i>
                Cadastrar Endereço
            </button>
            @if (auth()->user()->addresses->count() > 0)
                <a href="{{ route('checkout') }}" class="btn btn-link text-dark">
                    Cancelar
                </a>
            @endif
        </div>
    </form>
@else
    @php
        $type = (@$invoice) ? 'invoice' : 'delivery';
        $session_delivery = (request()->session()->get('app.checkout.address.delivery')) ?? 0;
        $session_invoice = (request()->session()->get('app.checkout.address.invoice')) ?? 0;

        // $checked = (@$invoice) ? $session_invoice : $session_delivery;
    @endphp

    <form action="{{ route('checkout.address.select') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-12">
                <p>O endereço selecionado será usado como seu endereço cobrança e endereço de entrega.</p>
            </div>
            @foreach (auth()->user()->addresses as $key => $address)
            <div class="col-12 col-sm-6 mb-3">
                <div class="card p-3">
                    <div class="custom-control custom-radio form-sd">
                        <input type="radio" id="checkout_delivery{{ $key }}" name="checkout_delivery" value="{{ $address->address_id }}" @if($session_delivery == $address->address_id) checked @endif class="custom-control-input">
                        <label class="custom-control-label" for="checkout_delivery{{ $key }}">
                            <span class="font-panton-bold text-second">{{ $address->address_name }}</span>
                        </label>
                    </div>
                    <div class="mt-3">
                        <p class="font-size-minus m-0">
                            {{ $address->street_name.', '.$address->number.' '.$address->complem }}
                        </p>
                        <p class="font-size-minus m-0">
                            {{ $address->district.', '.mask($address->post_code, '#####-###') }}
                        </p>
                        <p class="font-size-minus m-0">
                            {{ $address->city.' - '.$address->state }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <p class="m-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="mdi mdi-plus mr-2"></i>
                        Usar outro endereço como cobrança
                    </button>
                </p>
                <div class="collapse @if(old('checkout_invoice') || request()->session()->get('app.checkout.address.invoice')) show @endif" id="collapseExample">
                    <p class="font-panton-bold text-secondary mt-3">Selecione um endereço de cobrança</p>
                    <div class="row">
                        @foreach (auth()->user()->addresses as $key => $address)
                            <div class="col-12 col-sm-6 mb-3">
                                <div class="card p-3">
                                    <div class="custom-control custom-radio form-sd">
                                        <input type="radio" id="checkout_invoice{{ $key }}" name="checkout_invoice" value="{{ $address->address_id }}" @if($session_invoice == $address->address_id) checked @endif class="custom-control-input">
                                        <label class="custom-control-label" for="checkout_invoice{{ $key }}">
                                            <span class="font-panton-bold text-second">{{ $address->address_name }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-minus m-0">
                                            {{ $address->street_name.', '.$address->number.' '.$address->complem }}
                                        </p>
                                        <p class="font-size-minus m-0">
                                            {{ $address->district.', '.mask($address->post_code, '#####-###') }}
                                        </p>
                                        <p class="font-size-minus m-0">
                                            {{ $address->city.' - '.$address->state }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-second">
                    <i class="mdi mdi-check mr-2"></i>
                    Continuar
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="new_address" value="1">

                <button class="btn btn-link text-dark">
                    <i class="mdi mdi-plus mr-2"></i>
                    Adicionar novo endereço
                </button>
            </form>
        </div>
    </div>
@endif


{{-- @if (auth()->user()->addresses->count() == 0)
    <form action="{{ route('checkout.address.store') }}" method="POST" class="mt-3">
        @csrf

        @include('components.register.address-form')

        <div class="form-group">
            <button class="btn btn-first">
                <i class="mdi mdi-check mr-2"></i>
                Cadastrar Endereço
            </button>
        </div>
    </form>
@else
    @php
        $type = (@$invoice) ? 'invoice' : 'delivery';
        $session_delivery = (request()->session()->get('app.checkout.address.delivery')) ?? 0;
        $session_invoice = (request()->session()->get('app.checkout.address.invoice')) ?? 0;

        $checked = (@$invoice) ? $session_invoice : $session_delivery;
    @endphp

    <div class="row">
        @foreach (auth()->user()->addresses as $key => $address)
        <div class="col-6 mb-3">
            <div class="card p-3">
                <div class="custom-control custom-radio form-sd">
                    <input type="radio" id="checkout_{{ $type.$key }}" name="checkout_{{ $type }}" value="{{ $address->address_id }}" @if($checked == $address->address_id) checked @endif class="custom-control-input">
                    <label class="custom-control-label" for="checkout_{{ $type.$key }}">
                        <span class="font-panton-bold text-second">{{ $address->address_name }}</span>
                    </label>
                </div>
                <div class="mt-3">
                    <p class="font-size-minus m-0">
                        {{ $address->street_name.', '.$address->number.' '.$address->complem }}
                    </p>
                    <p class="font-size-minus m-0">
                        {{ $address->district.', '.mask($address->post_code, '#####-###') }}
                    </p>
                    <p class="font-size-minus m-0">
                        {{ $address->city.' - '.$address->state }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif --}}
