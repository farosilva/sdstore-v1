<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Fabricio Silva" />
    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/brand/logo-icon.png')}}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="no-scrollbar">
    @yield('content')
</body>
</html>
