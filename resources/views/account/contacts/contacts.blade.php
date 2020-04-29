@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Meus Contatos</h2>
            </div>
        </div>
        <div class="row mt-3">
            @forelse (auth()->user()->contacts as $contact)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="font-weight-bold">
                            <i class="mdi mdi-account mr-2"></i>
                            {{ $contact->contact_name }}
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="font-size-minus m-0">
                            <span class="font-weight-bold">Telefone 1:</span>
                            <span>{{ formatPhone($contact->phone_1) }}</span>
                        </p>
                        @if ($contact->phone_2)
                            <p class="font-size-minus m-0">
                                <span class="font-weight-bold">Telefone 2:</span>
                                <span>{{ formatPhone($contact->phone_2) }}</span>
                            </p>
                        @endif
                        @if ($contact->whatsapp)
                            <p class="font-size-minus m-0">
                                <span class="font-weight-bold">WhatsApp:</span>
                                <span>{{ formatPhone($contact->whatsapp) }}</span>
                            </p>
                        @endif
                        @if ($contact->email)
                            <p class="font-size-minus m-0">
                                <span class="font-weight-bold">E-mail:</span>
                                <span>{{ $contact->email }}</span>
                            </p>
                        @endif
                        <div class="mt-3 d-flex">
                            <a href="{{ route('my-account.contacts.edit', ['id' => $contact->contact_id]) }}" class="btn btn-sm btn-second rounded">
                                <i class="mdi mdi-pencil"></i>
                                Editar
                            </a>
                            @if (true == false)
                                <form action="{{ route('register.contact.destroy', ['id' => $contact->contact_id]) }}" method="POST" style="xdisplay: none;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-secondary rounded ml-2">
                                        <i class="mdi mdi-delete"></i>
                                        Deletar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>Não há contatos cadastrados.</p>
            </div>
            @endforelse
            <div class="form-group col-12 mt-3">
                <a href="{{ route('my-account.contacts.create') }}" class="btn btn-first">
                    <i class="mdi mdi-account-plus mr-2"></i>
                    Incluir Contato
                </a>
                <a href="{{ route('my-account') }}" class="btn btn-dark btn-sm">
                    <i class="mdi mdi-account-outline mr-2"></i>
                    Minha Conta
                </a>
            </div>




            {{-- <div class="col-8">
                <form action="{{ route('register.contact.store') }}" method="POST">
                    @csrf
                    @include('components.register.contact-form', ['update' => true, 'user' => auth()->user()])

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
            </div> --}}
        </div>
    </div>
@endsection
