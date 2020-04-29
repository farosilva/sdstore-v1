<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <div class="d-flex bg-light p-3 mb-3 border rounded justify-content-between">
        <div class="d-flex">
            <div class="custom-control custom-radio form-sd">
                <input type="radio" id="customRadio1" name="customRadio" checked class="custom-control-input">
                <label class="custom-control-label" for="customRadio1"></label>
            </div>
            <div class="font-weight-bold">
                Frete Promocional
            </div>
        </div>
        <div class="font-panton-bold ml-3">
            R$ 0,00
        </div>
    </div>

    <div class="mb-3">
        <p class="font-weight-bold mb-0">Entregaremos em até 24h após a confirmação do pagamento*</p>
        <small>*Exceto aos domingos e feriados</small>
    </div>

    <div class="mb-3">
        <textarea name="observation" maxlength="200" class="form-control form-sd" cols="30" rows="3" placeholder="Observações de entrega, tais como, interfone quebrado, tocar a campainha.">{{ @$observation }}</textarea>
    </div>

    <input type="hidden" name="select_delivery" value="1">
    <div class="mb-3">
        <button class="btn btn-second">
            <i class="mdi mdi-check mr-2"></i>
            Continuar
        </button>
    </div>
</form>
