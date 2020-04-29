@extends('layouts.app')

@section('content')
    <div class="container-xl mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 px-5">
                <div class="card-title mb-4">
                    <h3 class="font-panton-bold">Área Administrativa</h3>
                    <p class="text-secondary">Exclusivo a funcionários, entre com seus dados</p>
                </div>
                @include('components.login.login-form', ['admin' => true])
            </div>
        </div>
    </div>
@endsection
