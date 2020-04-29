@extends('layouts.app')

@section('breadcrumb')
    @if (@$edit)
        <x-breadcrumb
            :items="['Minha Conta','Meus Endereços']"
            :links="['/minha-conta','/minha-conta/meus-enderecos']"
            lastItem="Alterar"
        ></x-breadcrumb>
    @else
        <x-breadcrumb></x-breadcrumb>
    @endif
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Meus Endereços</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <form action="{{ route('register.address.store') }}" method="POST">
                    @csrf
                    @include('components.register.address-form')

                    @if (request()->checkout)
                        <input type="hidden" name="checkout" value="1">
                    @endif

                    <div class="form-group">
                        <button class="btn btn-first">
                            <i class="mdi mdi-check mr-2"></i>
                            Cadastrar Endereço
                        </button>
                        <a href="{{ route('my-account.address') }}" class="btn btn-dark btn-sm">
                            <i class="mdi mdi-undo mr-2"></i>
                            Meus Endereços
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
