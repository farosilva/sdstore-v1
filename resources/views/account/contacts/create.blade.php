@extends('layouts.app')

@section('breadcrumb')
    @if (@$edit)
        <x-breadcrumb
            :items="['Minha Conta','Meus Contatos']"
            :links="['/minha-conta','/minha-conta/meus-contatos']"
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
                <h2 class="text-secondary font-sidney">Meus Contatos</h2>
            </div>
        </div>
        @if (request()->checkout)
            <div class="row">
                <div class="col-12">
                    <x-alert type="warning">
                        Informe <span class="font-panton-bold">dados de contato</span> antes de fechar seu pedido
                    </x-alert>
                </div>
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-8">
                <form action="{{ route('register.contact.store') }}" method="POST">
                    @csrf
                    @include('components.register.contact-form')

                    @if (request()->checkout)
                        <input type="hidden" name="checkout" value="1">
                    @endif

                    <div class="form-group">
                        <button class="btn btn-first">
                            <i class="mdi mdi-check mr-2"></i>
                            Cadastrar Contato
                        </button>
                        <a href="{{ route('my-account.contacts') }}" class="btn btn-dark btn-sm">
                            <i class="mdi mdi-undo mr-2"></i>
                            Meus Contatos
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
