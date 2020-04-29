<div class="card-login">
    {{-- <form action="{{ route('login') }}" method="POST"> --}}
    <form action="@if(@$admin) {{route('login-admin')}} @else {{ route('login') }} @endif" method="POST">
        @csrf
        <div class="form-group">
            @if (@$admin)
            <label for="inputEmailAdmin">E-mail</label>
                <input type="text" value="{{ old('username') }}" id="inputEmailAdmin" name="username" class="form-control form-sd" errors="@error('email_login') {{ $message }} @enderror">
            @else
                <input-username-login value="{{ old('username') }}" name="username" errors="@error('email_login') {{ $message }} @enderror"></input-username-login>
            @endif
        </div>
        <div class="form-group">
            <div class="form-group">
                <label class="font-size-minus mb-1" for="inputPasswordLogin">Senha</label>
                <input type="password" name="password_login" value="{{ old('password_login') }}" id="inputPasswordLogin" class="form-control form-sd @error('password_login') is-invalid @enderror">
                @error('password_login')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <button type="submit" class="btn btn-first d-flex align-items-center">
                <i class="mdi mdi-login h5 mb-0 mr-2"></i>
                Entrar
            </button>
            <a href="{{ route('password.request') }}" class="btn btn-link text-dark font-size-minus">Esqueceu a Senha?</a>
        </div>
    </form>
</div>
