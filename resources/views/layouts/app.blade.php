<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Fabricio Silva" />
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/brand/logo-icon.png')}}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="no-scrollbar">
    <div id="app">
        @include('components.sections.header')
        {{ session('messages.error.cart') }}
        <main class="">
            @yield('content')
            <vue-snotify></vue-snotify>
        </main>

        <quickview-modal></quickview-modal>

        <welcome-modal
            link-home="{{ route('home') }}"
            link-account="{{ route('my-account') }}"
        ></welcome-modal>

        @include('components.sections.footer')
        @if (json_encode(Session::get('app.cookies.accept')) <> 'true')
            <cookie-message-widget></cookie-message-widget>
        @endif

        {{-- Messages Errors --}}

        @error('cart.error')
            <alert-widget
                title="Falhou"
                text="{{ $message }}"
                icon="error"
            ></alert-widget>
        @enderror
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
</body>
</html>
