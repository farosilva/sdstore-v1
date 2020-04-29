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
