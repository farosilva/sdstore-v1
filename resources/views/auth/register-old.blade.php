@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl mt-4">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                @if (@$messageLinkVerification)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Enviamos um link de <b>ativação de conta</b> em seu e-mail
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-title">
                    <h3 class="font-panton-bold">Registrar</h3>
                    <p class="text-secondary">Crie uma conta e aproveite nossos serviços.</p>
                </div>
                <div class="card-steps py-3 border-bottom mb-4">
                    <ul class="nav justify-content-around">
                        <li class="nav-item">
                            <div class="card-steps-item d-flex flex-column justify-content-center align-items-center @if(@$user) active @endif">
                                <div class="card-steps-icon d-flex justify-content-center align-items-center">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                                <h6 class="card-steps-text">Dados Pessoais</h6>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="card-steps-item d-flex flex-column justify-content-center align-items-center @if(@$address) active @endif">
                                <div class="card-steps-icon d-flex justify-content-center align-items-center">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                                <h6 class="card-steps-text">Endereços</h6>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="card-steps-item d-flex flex-column justify-content-center align-items-center @if(@$contact) active @endif">
                                <div class="card-steps-icon d-flex justify-content-center align-items-center">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                                <h6 class="card-steps-text">Contatos</h6>
                            </div>
                        </li>
                    </ul>
                </div>

                @if (@$user)
                    @include('components.register.user-form')
                @endif

                @if (@$address)
                    @include('components.register.address-form')
                @endif

                @if (@$contact)
                    @include('components.register.contact-form')
                @endif

            </div>
        </div>
    </div>
@endsection
