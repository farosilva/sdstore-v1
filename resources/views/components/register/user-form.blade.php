<div class="card-register">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="inputCpf" class="font-size-minus mb-1 form-required">CPF</label>
            <div class="is-invalid">
                <the-mask type="tel" :mask="['###.###.###-##']" name="cpf_cnpj" value="{{ old('cpf_cnpj') ?? @$user->cpf_cnpj }}" id="inputCpf" class="form-control form-sd @error('cpf_cnpj') is-invalid @enderror" @if(@$update) disabled @endif />
            </div>
            @error('cpf_cnpj')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="inputFullName" class="font-size-minus mb-1 form-required">Nome Completo</label>
        <input type="text" id="inputFullName" name="full_name" value="{{ old('full_name') ?? @$user->full_name }}" class="form-control form-sd @error('full_name') is-invalid @enderror">
        @error('full_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputShortName" class="font-size-minus mb-1 form-required">Nome Social</label>
        <input type="text" id="inputShortName" name="short_name" value="{{ old('short_name') ?? @$user->short_name }}" class="form-control form-sd @error('short_name') is-invalid @enderror">
        @error('short_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-sm-6">
            <label for="inputBirthDate" class="font-size-minus mb-1 form-required">Data Nascimento</label>
            <div class="is-invalid">
                <the-mask type="tel" :mask="['##/##/####']" name="birth_date" value="{{ (old('birth_date')) ?? (@$user->infos->birth_date ? $user->infos->birth_date->format('d/m/Y') : '') }}" id="inputBirthDate" class="form-control form-sd @error('birth_date') is-invalid @enderror" />
            </div>
            @error('birth_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-12 col-sm-6">
            <label class="font-size-minus mb-1 form-required">Gênero</label>
            <div class="d-flex justify-content-around mt-sm-1 justify-content-md-start">
                <div class="custom-control custom-radio form-sd">
                    <input type="radio" id="inputGenreFemale" name="genre" value="F" @if(old('genre') == 'F' or @$user->infos->genre == 'F') checked @endif class="custom-control-input @error('genre') is-invalid @enderror">
                    <label class="custom-control-label" for="inputGenreFemale">Feminino</label>
                </div>

                <div class="custom-control custom-radio form-sd ml-md-3">
                    <input type="radio" id="inputGenreMale" name="genre" value="M" @if(old('genre') == 'M' or @$user->infos->genre == 'M') checked @endif class="custom-control-input @error('genre') is-invalid @enderror">
                    <label class="custom-control-label" for="inputGenreMale">Masculino</label>
                </div>
            </div>
            @error('genre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group mb-1">
        <label for="inputEmail" class="font-size-minus mb-1 form-required">E-mail</label>
        <input type="text" id="inputEmail" name="email" value="{{ old('email') ?? @$user->email }}" class="form-control form-sd @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <small class="text-muted">*Para receber status de pedido e faturamento</small>
        @enderror
    </div>
    @if (@$store)
        <div class="form-group">
            <div class="form-row">
                <div class="form-group mb-0 col-12 col-sm-6 col-md-12 col-lg-6">
                    <label for="inputPasswordRegister" class="font-size-minus mb-1 form-required">Senha</label>
                    <input type="password" id="inputPasswordRegister" name="password" class="form-control form-sd @error('password') is-invalid @enderror">
                </div>
                <div class="form-group mb-0 col-12 col-sm-6 col-md-12 col-lg-6">
                    <label for="inputPasswordConfRegister" class="font-size-minus mb-1 form-required">Confirme Senha</label>
                    <input type="password" id="inputPasswordConfRegister" name="password_confirmation" class="form-control form-sd @error('password') is-invalid @enderror">
                </div>
            </div>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    @endif
    @if (@$store)
        <div class="form-group">
            <div class="custom-control custom-checkbox form-sd d-flex align-items-center">
                <input type="checkbox" class="custom-control-input @error('accept_terms') is-invalid @enderror" id="customCheck1" name="accept_terms" >
                <label class="custom-control-label" for="customCheck1">
                    Ao se registrar você aceita os
                    <a href="#" class="text-second">termos de uso</a> e nossa
                    <a href="#" class="text-second">politica de privacidade</a>.
                </label>
            </div>
        </div>
    @endif

    <div class="form-group">
        <span class="text-danger font-weight-bold">*</span> <small>Campos obrigatórios</small>
    </div>
</div>
