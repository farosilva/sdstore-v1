@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl mt-4">
        <div class="row">
            <div class="col-12 col-md-6 px-5">
                <div class="card-title mb-4">
                    <h3 class="font-panton-bold">Entrar</h3>
                    <p class="text-secondary">Se você já é registrado, faça o login</p>
                </div>
                @include('components.login.login-form')
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0 px-5">
                <div class="card-title mb-4">
                    <h3 class="font-panton-bold">Registrar</h3>
                    <p class="text-secondary">Crie uma conta e aproveite nossos serviços.</p>
                </div>
                <form action="{{ route('register.user.store') }}" method="POST">
                    @csrf

                    @include('components.register.user-form', ['store' => true])

                    <div class="form-group">
                        <button type="submit" class="btn btn-first d-flex align-items-center">
                            <i class="mdi mdi-check h5 mb-0 mr-2"></i>
                            Continuar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
