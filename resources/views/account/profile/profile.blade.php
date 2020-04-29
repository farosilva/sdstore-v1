@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Meus Dados</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                @include('components.register.user-form', ['update' => true, 'user' => auth()->user()])

                <a href="{{ route('my-account') }}" class="btn btn-dark btn-sm">
                    <i class="mdi mdi-undo mr-2"></i>
                    Minha Conta
                </a>
                @if (true == false)
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        @include('components.register.user-form', ['update' => true, 'user' => auth()->user()])

                        <div class="form-group">
                            <button class="btn btn-first">
                                <i class="mdi mdi-update mr-2"></i>
                                Atualizar Dados
                            </button>
                            <a href="{{ route('my-account') }}" class="btn btn-dark btn-sm">
                                <i class="mdi mdi-undo mr-2"></i>
                                Minha Conta
                            </a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
