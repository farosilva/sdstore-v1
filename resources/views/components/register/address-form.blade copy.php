<div class="card-register-address">
    @php
        $is_invoice = request()->is_invoice;
    @endphp

    @if (@$update !== true)
        <h5 class="text-second font-weight-bold mb-4">
            @if (@$is_invoice)
                <i class="mdi mdi-map-marker mr-2"></i>
                Endereço de Cobrança
            @else
                <i class="mdi mdi-truck-fast-outline mr-2"></i>
                Endereço de Entrega
            @endif
        </h5>
    @endif

    @if (@$errors->count() == 1 && $errors->has('city_code'))
        <div class="alert alert-warning">
            Falha ao validar endereço, clique no botão <button type="button" class="btn btn-sm btn-second rounded no-focus"><i class="mdi mdi-magnify"></i></button> e tente novamente.
        </div>
    @endif

    @error('address_invoice')
        <x-alert type="danger">
            {{ $message }}
        </x-alert>
    @enderror

    <div class="form-row">
        <div class="form-group col-8 col-sm-6">
            <label for="inputAddressName" class="font-size-minus mb-1">Nome Endereço</label>
            <input type="text" value="{{ old('address_name') ?? @$address->address_name }}" id="inputAddressName" name="address_name" class="form-control form-sd @error('address_name') is-invalid @enderror">
            @error('address_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <small class="text-muted">Ex.: Minha Casa, Meu Trabalho...</small>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-6 col-sm-4">
            <input-post-code-address
                post-code-type="D"
                post-code-session="{{ Session::get('app.components.welcome_modal.post_code', null) }}"
                old-input="{{ old('post_code') ?? @$address->post_code }}"
                error-input="@error('post_code') {{ $message }} @enderror"
            ></input-post-code-address>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-12">
            <label for="inputStreetNameDelivery" class="font-size-minus mb-1 form-required">Endereço</label>
            <input type="text" value="{{ old('street_name') ?? @$address->street_name }}" id="inputStreetNameDelivery" name="street_name" class="form-control form-sd @error('street_name') is-invalid @enderror">
            @error('street_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-6 col-sm-3">
            <label for="inputNumberDelivery" class="font-size-minus mb-1 form-required">Número</label>
            <input type="text" value="{{ old('number') ?? @$address->number }}" id="inputNumberDelivery" name="number" class="form-control form-sd @error('number') is-invalid @enderror">
            @error('number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-6 col-sm-4">
            <label for="inputComplemDelivery" class="font-size-minus mb-1">Complemento</label>
            <input type="text" value="{{ old('complem') ?? @$address->complem }}" id="inputComplemDelivery" name="complem" class="form-control form-sd @error('complem') is-invalid @enderror">
            @error('complem')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-5">
            <label for="inputDistrictDelivery" class="font-size-minus mb-1 form-required">Bairro</label>
            <input type="text" value="{{ old('district')  ?? @$address->district }}" id="inputDistrictDelivery" name="district" class="form-control form-sd @error('district') is-invalid @enderror">
            @error('district')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col">
            <label for="inputCityDelivery" class="font-size-minus mb-1 form-required">Cidade</label>
            <input type="text" value="{{ old('city')  ?? @$address->city }}" id="inputCityDelivery" name="city" class="form-control form-sd @error('city') is-invalid @enderror">
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-3">
            <label for="inputStateDelivery" class="font-size-minus mb-1 form-required">Estado</label>
            <input type="text" value="{{ old('state') ?? @$address->state }}" id="inputStateDelivery" name="state" class="form-control form-sd @error('state') is-invalid @enderror">
            @error('state')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="hidden" value="{{ old('city_code') ?? @$address->city_code }}" id="inputCityCodeDelivery" name="city_code">
        </div>

        @if (@$is_invoice)
            <div class="form-group col-12">
                <input type="hidden" name="for_invoice" value="1">
                <div class="custom-control custom-switch form-sd mr-3">
                    <input type="checkbox" name="for_delivery" class="custom-control-input" id="inputForDelivery" {{ (@$address->for_delivery) ? 'checked' : '' }} />
                    <label class="custom-control-label" for="inputForDelivery">Utilizar também como Endereço de Entrega</label>
                </div>
            </div>
        @else
            <div class="col-12 mb-3">
                @if (auth()->user()->addresses->count() > 0)
                    <div class="custom-control custom-switch form-sd mr-3">
                        <input type="checkbox" name="for_delivery" class="custom-control-input" id="inputForDelivery" {{ (@$address->for_delivery) ? 'checked' : '' }} />
                        <label class="custom-control-label" for="inputForDelivery">Endereço de Entrega</label>
                    </div>
                    <div class="custom-control custom-switch form-sd">
                        <input type="checkbox" name="for_invoice" class="custom-control-input" id="inputForInvoice" {{ (@$address->for_invoice) ? 'checked' : '' }} />
                        <label class="custom-control-label" for="inputForInvoice">Endereço de Cobrança</label>
                    </div>
                    @error('for_delivery')
                        <small class="text-danger">
                            Escolha uma opção
                        </small>
                    @enderror
                @else
                    <input type="hidden" name="for_delivery" value="on" />
                    <div class="custom-control custom-switch form-sd">
                        <input type="checkbox" name="for_invoice" class="custom-control-input" id="inputDeliveryInvoice" />
                        <label class="custom-control-label" for="inputDeliveryInvoice">Utilizar também como Endereço de Cobrança</label>
                    </div>
                @endif
            </div>
        @endif
    </div>

    <div class="form-group">
        <span class="text-danger font-weight-bold">*</span> <small>Campos obrigatórios</small>
    </div>
</div>

<script>
    function toggleInvoiceAddress(e){
        if(e.checked){
            $("#invoiceAdddress").removeClass('d-none')
        }else{
            $("#invoiceAdddress").addClass('d-none')

            $('#inputPostCodeInvoice').val('')
            $('#inputStreetNameInvoice').val('')
            $('#inputDistrictInvoice').val('')
            $('#inputCityInvoice').val('')
            $('#inputStateInvoice').val('')
            $('#inputCityCodeInvoice').val('')
        }
    }
</script>
