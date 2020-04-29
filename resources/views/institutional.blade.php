@extends('layouts.app')

@section('breadcrumb')
    <x-breadcrumb></x-breadcrumb>
@endsection

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="page-title text-dark text-center font-sidney">DNA Santo Dom</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-12 col-md-10 col-lg-8 d-flex flex-column">
            <h4 class="text-center mb-4 font-weight-bold">Saudável, delicioso e sem culpa!</h4>
            <div>
                <p class="text-justify h5 mb-3">
                    A Santo Dom Alimentos surgiu com a proposta de atender às necessidades de pessoas
                    que buscam qualidade de vida através de uma alimentação mais saudável.
                </p>
                <p class="text-justify h5 mb-3">
                    Acreditamos que com uma alimentação saudável e prática, adequada à rotina, sobra
                    mais tempo para cuidar de si e curtir a família, deixando a vida mais leve e simples
                    como tem que ser.
                </p>
                <p class="text-justify h5 mb-3">
                    Por isso, trabalhamos diariamente para aprimorar nossos produtos e trazer novas opções
                    aos nossos clientes.
                </p>
                <p class="text-justify h5 mb-3">
                    Nossos produtos são preparados em ambiente totalmente isolado de glúten, podendo ser
                    consumidos por pessoas celíacas e por todos que buscam saborosas opções vegetarianas e
                    veganas.
                </p>
            </div>
            <div class="stamps-institutional">
                <ul class="list-stamps-institutional nav flex-column mx-auto">
                    <li class="list-stamps-item d-flex align-items-center border-bottom py-2">
                        <div class="stamps-image-content mx-5 my-1">
                            <img src="{{ asset('images/stamps/icone_trigo.png') }}" class="stamps-image" alt="">
                        </div>
                        <div class="stamps-text-content flex-grow-1">
                            <h5 class="mb-0">
                                <span class="font-panton-bold text-secondary">Nenhum</span> de nossos produtos contém glútem.
                            </h5>
                        </div>
                    </li>
                    <li class="list-stamps-item d-flex align-items-center border-bottom py-2">
                        <div class="stamps-image-content mx-5 my-1">
                            <img src="{{ asset('images/stamps/icone_animais.png') }}" class="stamps-image" alt="">
                        </div>
                        <div class="stamps-text-content flex-grow-1">
                            <h5 class="mb-0">
                                Linha vegetariana, ou seja, <span class="font-panton-bold text-secondary">sem carne.</span>
                            </h5>
                        </div>
                    </li>
                    <li class="list-stamps-item d-flex align-items-center border-bottom py-2">
                        <div class="stamps-image-content mx-5 my-1">
                            <img src="{{ asset('images/stamps/icone_folha.png') }}" class="stamps-image" alt="">
                        </div>
                        <div class="stamps-text-content flex-grow-1">
                            <h5 class="mb-0">
                                <span class="font-panton-bold text-secondary">Linha vegana</span>, ou seja, sem nada de origem animal.
                            </h5>
                        </div>
                    </li>
                    <li class="list-stamps-item d-flex align-items-center pt-2">
                        <div class="stamps-image-content mx-5 my-1">
                            <img src="{{ asset('images/stamps/icone_leite.png') }}" class="stamps-image" alt="">
                        </div>
                        <div class="stamps-text-content flex-grow-1">
                            <h5 class="mb-0">
                                Muitos deles são <span class="font-panton-bold text-secondary">sem lactose.</span>
                            </h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-10 col-lg-8 d-flex flex-column">
            <h4 class="text-center mb-4 font-weight-bold">Nossas farinhas são especiais!</h4>
            <div>
                <p class="text-justify h5 mb-3">
                    Um dos grandes segredos do sabor e da qualidade dos nossos produtos está nas farinhas que utilizamos:
                </p>
            </div>
            <div class="flour-institutional mt-3">
                <ul class="list-flour-institutional nav flex-column mx-auto">
                    <li class="list-flour-item border-bottom d-flex flex-column flex-sm-row align-items-sm-center pb-3 py-sm-2 my-2">
                        <div class="flour-image-content mr-5 mb-3 mt-1 d-flex align-items-center">
                            <img src="{{ asset('images/stamps/colher_01.png') }}" class="flour-image" alt="">
                        </div>
                        <div class="flour-text-content flex-grow-1">
                            <h5 class="font-weight-bold">Semente de Girassol</h5>
                            <p class="text-justify mb-0">São uma excelente fonte de vitamina E, que é um poderoso antioxidante. A vitamina E viaja por todo corpo neutralizando os radicais livres, protegendo o organismo contra as gorduras "más", promovendo a desintoxicação celular. Ajuda a baixar os níveis de colesterol e tem um alto poder anti-inflamatório</p>
                        </div>
                    </li>
                    <li class="list-flour-item border-bottom d-flex flex-column flex-sm-row align-items-sm-center pb-3 py-sm-2 my-2">
                        <div class="flour-image-content mr-5 mb-3 mt-1 d-flex align-items-center">
                            <img src="{{ asset('images/stamps/colher_02.png') }}" class="flour-image" alt="">
                        </div>
                        <div class="flour-text-content flex-grow-1">
                            <h5 class="font-weight-bold">Farinha de Maça</h5>
                            <p class="text-justify mb-0">Fortalece os músculos e é um poderoso bloqueador de gordura, por ser rica em pectina que se transforma em gel no estômago e ainda regula o intestino e reduz o apetite com ação de saciedade. Os benefícios são devidos ao ácido ursólico, uma substância encontrada na casca que reduz a gordura, os níveis de açúcar, colesterol e triglicérides.</p>
                        </div>
                    </li>
                    <li class="list-flour-item border-bottom d-flex flex-column flex-sm-row align-items-sm-center pb-3 py-sm-2 my-2">
                        <div class="flour-image-content mr-5 mb-3 mt-1 d-flex align-items-center">
                            <img src="{{ asset('images/stamps/colher_03.png') }}" class="flour-image" alt="">
                        </div>
                        <div class="flour-text-content flex-grow-1">
                            <h5 class="font-weight-bold">Linhaça</h5>
                            <p class="text-justify mb-0">Combate o envelhecimento precoce da pele e diminui a ocorrência de doenças degenerativas, já que possui vitamina E vinda da casca da linhaça dourada. Vários tipos de gorduras polinsaturadas estão presentes na linhaça dourada, como Ômega-3, Ômega-6, Ômega-9. Estas por sua vez auxiliam no tratamento de doenças do coração e vasos sanguíneos, além de ajudar a reduzir o mau colesterol (LDL).</p>
                        </div>
                    </li>
                    <li class="list-flour-item border-bottom d-flex flex-column flex-sm-row align-items-sm-center pb-3 py-sm-2 my-2">
                        <div class="flour-image-content mr-5 mb-3 mt-1 d-flex align-items-center">
                            <img src="{{ asset('images/stamps/colher_04.png') }}" class="flour-image" alt="">
                        </div>
                        <div class="flour-text-content flex-grow-1">
                            <h5 class="font-weight-bold">Farinha de Maracujá</h5>
                            <p class="text-justify mb-0">Diminui as taxas de açúcar do sangue e auxilia a perda de gordura do organismo. Isso se deve a pectina encontrada na casca do maracujá que dá a sensação de saciedade, além de eliminar as toxinas do organismo e equilibrar o metabolismo.</p>
                        </div>
                    </li>
                    <li class="list-flour-item border-bottomx d-flex flex-column flex-sm-row align-items-sm-center pb-3 py-sm-2 my-2">
                        <div class="flour-image-content mr-5 mb-3 mt-1 d-flex align-items-center">
                            <img src="{{ asset('images/stamps/colher_05.png') }}" class="flour-image" alt="">
                        </div>
                        <div class="flour-text-content flex-grow-1">
                            <h5 class="font-weight-bold">Psyllium</h5>
                            <p class="text-justify mb-0">É a casca retirada de uma planta do gênero Plantago rica em mucilagem, fibras solúveis, insolúveis e alguns óleos essenciais para o nosso organismo.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-4 mt-lg-1">
            <a class="btn btn-lg btn-first" href="{{ route('products') }}">
                <i class="mdi mdi-view-grid mr-2"></i>
                Conheça Nossos Produtos
            </a>
        </div>
    </div>
</div>
@endsection
