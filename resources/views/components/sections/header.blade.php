<header class="header-main">
    <div class="header-top border-bottom">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 d-flex justify-content-center justify-content-md-between py-2">
                    <div class="header-top-left d-none d-md-flex align-items-center">
                        <a href="tel:{{env('APP_PHONE')}}" class="no-link text-dark">
                            <i class="mdi mdi-phone-outline h4 mb-0 mr-2"></i>
                        </a>
                        <span>{{ env('APP_PHONE') }}</span>
                    </div>
                    <div class="header-top-right">
                        <ul class="nav-social-medias nav align-items-center">
                            <li class="social-medias-items mr-3 d-none d-md-block">
                                <button-welcome-modal></button-welcome-modal>
                            </li>
                            <li class="social-medias-items">
                                <a target="_blank" href="https://www.facebook.com/SantoDomAlimentosSaudaveis/" class="social-medias-links">
                                    <i class="mdi mdi-facebook h4 mb-0"></i>
                                </a>
                            </li>
                            <li class="social-medias-items ml-3">
                                <a target="_blank" href="https://www.instagram.com/santodomalimentos/" class="social-medias-links">
                                    <i class="mdi mdi-instagram h4 mb-0"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 d-flex justify-content-between py-3">
                    <div class="header-middle-sidebar-icon d-flex d-md-none">
                        <div class="dropdown">
                            <button class="btn no-focus m-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-menu h3 m-0"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="mdi mdi-home mr-2"></i>
                                    Home
                                </a>
                                <a class="dropdown-item" href="{{ route('institutional') }}">
                                    <i class="mdi mdi-account-group mr-2"></i>
                                    A Santo Dom
                                </a>
                                <a class="dropdown-item" href="{{ route('products') }}">
                                    <i class="mdi mdi-view-grid mr-2"></i>
                                    Produtos
                                </a>
                                <a class="dropdown-item" href="{{ route('contacts') }}">
                                    <i class="mdi mdi-phone mr-2"></i>
                                    Contatos
                                </a>
                                <a class="dropdown-item" href="{{ route('my-account') }}">
                                    <i class="mdi mdi-account mr-2"></i>
                                    Minha Conta
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-middle-logo flex-grow-1 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="image-logo-content">
                            <a href="{{ route('home') }}" class="no-link">
                                <img src="{{asset('images/brand/logo-horizontal.png')}}" class="header-logo" alt="Logotipo">
                            </a>
                        </div>
                    </div>
                    <div class="header-middle-search flex-grow-1 d-none d-md-flex align-items-center justify-content-center">
                        @php
                            if(request()->route()->getName() == 'search'){
                                $search = request()->search;
                            }
                        @endphp
                        <form action="{{ route('search') }}" class="w-100" method="GET">
                            <div class="input-group search-input w-100 mb-0 px-3">
                                <input type="text" class="form-control form-control-lg form-sd" value="{{ @$search }}" name="search" placeholder="Pesquise um produto aqui..." aria-label="Pesquise um produto aqui..." aria-describedby="btn-search">
                                <div class="input-group-append">
                                    <button class="btn btn-second d-flex justify-content-center align-items-center" type="button" id="btn-search">
                                        <i class="mdi mdi-magnify h5 m-0"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="header-middle-widgets d-flex align-items-center justify-content-end">
                        <ul class="header-widgets nav align-items-center flex-nowrap">
                            @if (auth('admin')->check())
                            <a class="dropdown-item" href="{{ route('logout-admin') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                                {{-- <div class="dropdown">
                                    <a href="{{ route('my-account') }}" class="btn no-focus" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdil mdil-account h2 m-0"></i>
                                    </a>
                                    <div class="dropdown-menu card-account" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('my-account') }}">Minha Conta</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div> --}}
                            @else
                                <li class="header-widgets-items d-none d-md-block flex-none">
                                    @auth
                                        <div class="dropdown">
                                            <a href="{{ route('my-account') }}" class="btn no-focus" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdil mdil-account h2 m-0"></i>
                                            </a>
                                            <div class="dropdown-menu card-account" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('my-account') }}">Minha Conta</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    Sair
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('my-account') }}" class="login-widget text-decoration-none">
                                            <span class="d-none d-lg-block">
                                                Entrar / Registrar
                                            </span>
                                            <span class="d-lg-none">
                                                <i class="mdil mdil-account h2 m-0"></i>
                                            </span>
                                        </a>
                                    @endauth
                                </li>
                            @endif
                            @php
                                $cart = Gloudemans\Shoppingcart\Facades\Cart::count();
                            @endphp
                            @if ($cart)
                                <li class="header-widgets-items">
                                    <cart-countdown-widget></cart-countdown-widget>
                                </li>
                            @endif
                            <li class="header-widgets-items">
                                <cart-widget route="{{ Request::route()->getName() }}"></cart-widget>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="header-navbar-content bg-second py-2 d-none d-sm-block">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <ul class="header-navbar nav justify-content-center">
                            <li class="nav-item">
                                <a class="header-navbar-items nav-link font-panton-bold text-light" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="header-navbar-items nav-link font-panton-bold text-light" href="{{ route('institutional') }}">A Santo Dom</a>
                            </li>
                            <li class="nav-item">
                                <a class="header-navbar-items nav-link font-panton-bold text-light" href="{{ route('products') }}">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="header-navbar-items nav-link font-panton-bold text-light" href="{{ route('contacts') }}">Contatos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('breadcrumb')
</header>
