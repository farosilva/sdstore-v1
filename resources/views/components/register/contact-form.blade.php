<div class="card-register-contact">
    <div class="form-row">
        <div class="form-group col-12 col-sm-6">
            <label for="inputContactName" class="font-size-minus mb-1 form-required">Nome</label>
            <input type="text" id="inputContactName" value="{{ old('contact_name') ?? @$contact->contact_name }}" name="contact_name" class="form-control form-sd @error('contact_name') is-invalid @enderror" @if(@$delete) disabled @endif >
            @error('contact_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-md-6">
            <label for="inputPhone1" class="font-size-minus mb-1 form-required">Telefone 1</label>
            <div class="is-invalid">
                <the-mask type="tel" :mask="['(##) ####-####', '(##) #####-####']" id="inputPhone1" value="{{ old('phone_1') ?? @$contact->phone_1 }}" name="phone_1" class="form-control form-sd  @error('phone_1') is-invalid @enderror" @if(@$delete) disabled @endif />
            </div>
            @error('phone_1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="inputPhone2" class="font-size-minus mb-1">Telefone 2</label>
            <div class="is-invalid">
                <the-mask type="tel" :mask="['(##) ####-####', '(##) #####-####']" id="inputPhone2" value="{{ old('phone_2') ?? ((@$contact->phone_2 == 0) ? '' : @$contact->phone_2) }}" name="phone_2" class="form-control form-sd  @error('phone_2') is-invalid @enderror" @if(@$delete) disabled @endif />
            </div>
            @error('phone_2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-12 col-md-4">
            <label for="inputWhatsapp" class="font-size-minus mb-1">WhatsApp</label>
            <div class="is-invalid">
                <the-mask type="tel" onchange="toggleCheckWhatsapp()" :mask="['(##) #####-####']" id="inputWhatsapp" value="{{ old('whatsapp') ?? ((@$contact->whatsapp == 0) ? '' : @$contact->whatsapp) }}" name="whatsapp" class="form-control form-sd  @error('whatsapp') is-invalid @enderror" @if(@$delete) disabled @endif />
            </div>
            @error('whatsapp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-12 col-md-8">
            <label for="inputEmail" class="font-size-minus mb-1">E-mail</label>
            @if (auth()->user()->contacts->count() == 0)
                <input type="text" onchange="toggleCheckEmail()" id="inputEmail" value="{{ old('email') ?? auth()->user()->email }}" name="email" class="form-control form-sd  @error('email') is-invalid @enderror" />
            @else
                <input type="text" onchange="toggleCheckEmail()" id="inputEmail" value="{{ old('email') ?? @$contact->email }}" name="email" class="form-control form-sd  @error('email') is-invalid @enderror" @if(@$delete) disabled @endif />
            @endif
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if (true == false)
            <div class="col-12 mt-3 border-top pt-3">
                <p>Podemos te deixar por dentro de nossas novidades, ofertas e promoções, basta habilitar os canais desejados.</p>
            </div>
            <div class="form-group col-12">
                <div id="checkboxAcceptWhatsapp" class="custom-control custom-checkbox form-sd">
                    <input type="checkbox" name="accept_whatsapp" class="custom-control-input" id="inputAcceptWhatsapp" {{ old('accept_whatsapp') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="inputAcceptWhatsapp">Aceito via WhatsApp</label>
                </div>
                <div id="checkboxAcceptEmail" class="custom-control custom-checkbox form-sd">
                    <input type="checkbox" name="accept_email" class="custom-control-input" id="inputAcceptEmail" {{ old('accept_email') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="inputAcceptEmail">Aceito via E-mail</label>
                </div>
            </div>
        @endif
    </div>

    <div class="form-group">
        <span class="text-danger font-weight-bold">*</span> <small>Campos obrigatórios</small>
    </div>
</div>
