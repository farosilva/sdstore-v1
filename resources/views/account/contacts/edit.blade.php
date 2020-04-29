@extends('layouts.app')

@section('breadcrumb')
    @if (@$update)
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
        <div class="row mt-3">
            <div class="col-8">
                <form action="{{ route('register.contact.update', ['contact_id' => @$contact->contact_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('components.register.contact-form')

                    <div class="form-group">
                        <button class="btn btn-first">
                            <i class="mdi mdi-refresh mr-2"></i>
                            Alterar Contato
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
