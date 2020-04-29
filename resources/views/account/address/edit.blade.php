@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb
        :items="['Minha Conta','Meus Enderecos']"
        :links="['/minha-conta','/minha-conta/meus-enderecos']"
        lastItem="Alterar"
    ></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Endereços</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <form action="{{ route('register.address.update', ['address_id' => $address->address_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('components.register.address-form')

                    <div class="form-group">
                        <button class="btn btn-first">
                            <i class="mdi mdi-update mr-2"></i>
                            Atualizar Dados
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
