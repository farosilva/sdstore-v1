@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="text-secondary font-sidney">Endereços</h2>
            </div>
        </div>
        <div class="row mt-3">
            @forelse (auth()->user()->addresses as $address)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="font-weight-bold">
                            <i class="mdi mdi-map-marker mr-2"></i>
                            {{ $address->address_name }}
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="font-size-minus m-0">
                            {{ $address->street_name }},
                            {{ $address->number.' '.$address->complem }}
                        </p>
                        <p class="font-size-minus m-0">
                            {{ $address->district.', '.mask($address->post_code, '#####-###') }}
                        </p>
                        <p class="font-size-minus m-0">
                            {{ $address->city.' - '.$address->state }}
                        </p>
                        <div class="mt-3 d-flex">
                            <a href="{{ route('my-account.address.edit', ['id' => $address->address_id]) }}" class="btn btn-sm btn-second rounded">
                                <i class="mdi mdi-pencil"></i>
                                Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12">
                    <p>Não há endereços cadastrados.</p>
                </div>
            @endforelse
            <div class="form-group col-12 mt-3">
                <a href="{{ route('my-account.address.create') }}" class="btn btn-first">
                    <i class="mdi mdi-map-marker-plus mr-2"></i>
                    Incluir Endereço
                </a>
                <a href="{{ route('my-account') }}" class="btn btn-dark btn-sm">
                    <i class="mdi mdi-account-outline mr-2"></i>
                    Minha Conta
                </a>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    $( window ).on( "load", readyFn );
</script>
