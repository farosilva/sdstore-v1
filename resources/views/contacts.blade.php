@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="page-title text-dark text-center font-sidney">Contatos</h1>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-12">
            <h5 class="text-center">Em caso de dúvidas, reclamações e sugestões entre em contato conosco:</h5>
        </div>
        <div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-center mt-2">
            <h5>Pelo telefone <span class="text-second font-weight-bold">{{env('APP_PHONE')}}</span></h5>
            <h5 class="d-none d-md-block mx-3">|</h5>
            <h5>WhatsApp <span class="text-second font-weight-bold">{{env('APP_WHATSAPP')}}</span></h5>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <h5 class="text-center text-secondfont-weight-bold">Envie uma mensagem!</h5>
            @if (@session('success_message'))
                <x-alert type="success">
                    Mensagem enviada com sucesso
                </x-alert>
            @endif
            <form action="{{ route('notification.from-client') }}" class="mt-4" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="inputContactName" class="font-size-minus mb-1 form-required">Nome</label>
                        <input type="text" name="contact_name" value="{{ old('contact_name') }}" class="form-control form-sd @error('contact_name') is-invalid @enderror" id="inputContactName">
                        <div class="invalid-feedback">
                            @error('contact_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="inputContactPhone" class="font-size-minus mb-1 form-required">Telefone</label>
                        <div class="is-invalid">
                            <the-mask :mask="['(##) ####-####', '(##) #####-####']" type="tel" name="contact_phone" value="{{ old('contact_phone') }}" class="form-control form-sd @error('contact_phone') is-invalid @enderror" id="inputContactPhone">
                        </div>
                        <div class="invalid-feedback">
                            @error('contact_phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="inputContactEmail" class="font-size-minus mb-1 form-required">E-mail</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email') }}" class="form-control form-sd @error('contact_email') is-invalid @enderror" id="inputContactEmail">
                        <div class="invalid-feedback">
                            @error('contact_email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="inputContactMensagem" class="font-size-minus mb-1">Mensagem</label>
                        <textarea type="text" name="contact_mensagem" value="{{ old('contact_mensagem') }}" class="form-control form-sd @error('contact_mensagem') is-invalid @enderror" id="inputContactMensagem" rows="6"></textarea>
                        <div class="invalid-feedback">
                            @error('contact_mensagem')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <button class="btn btn-lg btn-block btn-first">
                            <i class="mdi mdi-send mr-2"></i>
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
