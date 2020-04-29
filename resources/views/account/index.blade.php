@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row mtx-3">
            <div class="col-12 py-3">
                <h1 class="page-title text-dark text-center font-sidney">Minha Conta</h1>
            </div>
        </div>
        <div class="row mt-4 navgation-account">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="navgation-account-item border">
                    <a href="{{ route('my-account.profile') }}" class="navgation-account-link d-flex flex-column flex-fill h-100 justify-content-center align-items-center">
                        <div class="navgation-account-icon p-0 m-0">
                            <i class="mdi mdi-account-circle icon"></i>
                        </div>
                        <div class="navgation-account-text">
                            <span class="font-panton-bold text-uppercase">Meus Dados</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="navgation-account-item border">
                    <a href="{{ route('my-account.contacts') }}" class="navgation-account-link d-flex flex-column flex-fill h-100 justify-content-center align-items-center">
                        <div class="navgation-account-icon p-0 m-0">
                            <i class="mdi mdi-contacts icon"></i>
                        </div>
                        <div class="navgation-account-text">
                            <span class="font-panton-bold text-uppercase">Meus Contatos</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="navgation-account-item border">
                    <a href="{{ route('my-account.address') }}" class="navgation-account-link d-flex flex-column flex-fill h-100 justify-content-center align-items-center">
                        <div class="navgation-account-icon p-0 m-0">
                            <i class="mdi mdi-map-marker icon"></i>
                        </div>
                        <div class="navgation-account-text">
                            <span class="font-panton-bold text-uppercase">Meus Endereços</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="navgation-account-item border">
                    <a href="{{ route('my-account.orders') }}" class="navgation-account-link d-flex flex-column flex-fill h-100 justify-content-center align-items-center">
                        <div class="navgation-account-icon p-0 m-0">
                            <i class="mdi mdi-receipt icon"></i>
                        </div>
                        <div class="navgation-account-text">
                            <span class="font-panton-bold text-uppercase">Meus Pedidos</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="navgation-account-item border">
                    <a class="navgation-account-link d-flex flex-column flex-fill h-100 justify-content-center align-items-center"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <div class="navgation-account-icon p-0 m-0">
                            <i class="mdi mdi-logout icon"></i>
                        </div>
                        <div class="navgation-account-text">
                            <span class="font-panton-bold text-uppercase">Sair</span>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
