<p class="m-0">Você está conectado como <span class="text-second font-panton-bold">{{ auth()->user()->short_name }}</span>.</p>
<p class="mb-0">
    Não é você?
    <a class="text-dark font-weight-bold m-0" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('checkout-logout-form').submit();">
        Sair
    </a>

</p>
<small class="text-muted">Se você sair agora, os produtos em seu carrinho serão deletados.</small>

<form id="checkout-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@if (auth()->user()->contacts->count() == 0)
    <hr>
    <p class="font-weight-bold">
        <i class="mdi mdi-account mr-2"></i>
        Incluir Contato
    </p>

    <form action="{{ route('checkout.contacts.store') }}" method="POST">
        @csrf
        @include('components.register.contact-form')

        <div class="form-group">
            <button class="btn btn-first">
                <i class="mdi mdi-check mr-2"></i>
                Cadastrar Contato
            </button>
        </div>
    </form>
@else
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <div class="my-3">
            <button class="btn btn-second">
                <i class="mdi mdi-check mr-2"></i>
                Continuar
            </button>
        </div>
    </form>
@endif
