<footer class="footer-main">
    <div class="footer-top">
        <div class="container-xl mt-2">
            <div class="row border-top py-4">
                <div class="mb-3 col-12 col-md-4">
                    <div class="footer-brand-content d-flex flex-column align-items-center align-items-lg-start ">
                        <div class="footer-brand-logotipo">
                            <img src="{{ asset('images/brand/logo-horizontal.png') }}" class="logotipo-footer" alt="Logotipo">
                        </div>
                        <div class="footer-brand-text mt-3 d-flex justify-content-center">
                            <p class="font-size-minus text-muted text-justify">
                                Os nossos alimentos são feitos com ingredientes naturais e totalmente sem glúten,
                                preparados com o tempero saudável de quem ama o que faz.
                            </p>
                        </div>
                        <div class="footer-brand-contacts w-100">
                            <p class="font-size-minus mb-1">
                                <span class="font-panton-bold">E-mail: </span>
                                {{ env('APP_EMAIL_CONTACT') }}
                            </p>
                            <p class="font-size-minus mb-1">
                                <span class="font-panton-bold">Tel.: </span>
                                {{ env('APP_PHONE') }}
                            </p>
                            <p class="font-size-minus mb-1">
                                <span class="font-panton-bold">WhatsApp: </span>
                                {{ env('APP_WHATSAPP') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-3 border-left border-right">
                    <div class="footer-info content">
                        <h5 class="font-weight-bold mb-4">Utilidades</h5>
                        <div class="footer-info-links">
                            <a href="{{ route('my-account') }}" class="font-size-minus text-dark">
                                <p>Minha Conta</p>
                            </a>
                            <a href="{{ route('my-account.address') }}" class="font-size-minus text-dark">
                                <p>Meus Endereços</p>
                            </a>
                            <a href="{{ route('my-account.orders') }}" class="font-size-minus text-dark">
                                <p>Meus Pedidos</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-5">
                    <div class="footer-newsletter content">
                        <h5 class="font-weight-bold mb-4">Receba Nossas Novidades</h5>
                        @if (@session('success_subscribe'))
                            <x-alert type="success">
                                Incrição realizada com sucesso
                            </x-alert>
                        @endif
                        <div class="footer-newsletter-text mt-3">
                            <p class="font-size-minus text-muted text-justify">Fique por dentro de nossas novidades e promoções
                                exclusivas no seu <span class="text-second font-weight-bold">WhatsApp</span> ou
                                <span class="text-second font-weight-bold">E-mail</span> ao se increver.
                                Você pode cancelar a inscrição a qualquer momento.
                            </p>
                        </div>
                        @error('name')
                            <div class="mb-3">
                                <p class="mb-0 font-size-minus text-danger">Informe seu nome</p>
                            </div>
                        @else
                            @error('email')
                                <div class="mb-3">
                                    <p class="mb-0 font-size-minus text-danger">Informe um e-mail ou whatsapp válidos</p>
                                </div>
                            @else
                                @error('whatsapp')
                                    <div class="mb-3">
                                        <p class="mb-0 font-size-minus text-danger">Informe um e-mail ou whatsapp válidos</p>
                                    </div>
                                @enderror
                            @enderror
                        @enderror
                        <form action="{{ route('subscriber.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group mb-0 col-6">
                                    <label for="inputNewsletterName" class="font-size-minus mb-1 form-required">Seu Nome</label>
                                    <input type="text" class="form-control form-sd" name="name" value="{{ old('name') }}" id="inputNewsletterName" />
                                </div>
                                <div class="form-group mb-0 col-6">
                                    <label for="inputNewsletterWhatsapp" class="font-size-minus mb-1">WhatsApp</label>
                                    <the-mask :mask="['(##) #####-####']" type="tel" class="form-control form-sd" name="whatsapp" value="{{ old('whatsapp') }}" id="inputNewsletterWhatsapp" />
                                </div>
                                <div class="form-group mb-0 mt-1 col-12">
                                    <label for="inputNewsletterEmail" class="font-size-minus mb-1">E-mail</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control form-sd" name="email" value="{{ old('email') }}" id="inputNewsletterEmail" />
                                        <div class="input-group-prepend">
                                            <button class="btn btn-smx btn-outline-second" type="submit">
                                                <i class="mdi mdi-send mr-2"></i>
                                                Increver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom border-top">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 py-4 d-flex">
                    <div class="footer-bottom-left flex-grow-1 borderborder-first">
                        <span class="font-size-minus text-muted">{{ env('APP_COMPANY') }}</span><br>
                        <span class="font-size-minus text-muted">Copyright <i class="mdi mdi-copyright"></i> 2020 - Todos os direitos reservados.</span>
                    </div>
                    <div class="footer-bottom-right borderborder-second d-flex align-items-center">
                        <img width="120" src="{{ asset('images/stamps/pagseguro-logo.png') }}" alt="Logotipo Pagseguro">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
