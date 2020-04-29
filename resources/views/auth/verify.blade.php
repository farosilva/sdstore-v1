@extends('layouts.app')

@section('content')
<div class="container-xl mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-verify-account bg-light rounded p-4">
                <div class="card-title mb-3">
                    <h4 class="font-weight-bold">
                        <i class="mdi mdi-email-outline mr-3"></i>
                        Verifique sua Caixa de Entrada
                    </h4>
                </div>

                <p>Um link de ativação de conta foi enviado para o seu e-mail.</p>
                <p>Siga as orientações em seu e-mail antes de prosseguir.</p>

                @php
                    function hide_mail($email) {
                        $mail_segments = explode("@", $email);
                        $mail_segments[0] = substr($mail_segments[0], 0, 3).str_repeat("*", strlen($mail_segments[0]) - 5).substr($mail_segments[0], strlen($mail_segments[0]) - 2, 2);
                        return implode("@", $mail_segments);
                    }

                    echo '<p class="font-panton-bold text-second">'. hide_mail(auth()->user()->email) .'</p>';
                @endphp

                <p>Verifique também sua caixa de span.</p>

                <span class="pt-4">Se você não recebeu o e-mail</span>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-dark font-weight-bold p-0 m-0 align-baseline">clique para solicitar um outro</button>.
                </form>

            </div>
        </div>
    </div>
</div>

<div class="container mt-4 d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('.Before proceeding, please check your email for a verification link') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
