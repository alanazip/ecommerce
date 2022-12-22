@extends('site.layout')

@section('content')
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
  <div class="container py-5">


    @csrf
    <div class="col-lg-8 text-center text-lg-start" align="left">
      @auth
      @if (date('H') > 0 && date("H") < 12) <p class="fs-4 text-white mb-lg-4">Olá, bom dia! Seja bem vindo {{ Auth::user()->name }}!</p>
        @elseif (date("H") < 18) <p class="fs-4 text-white mb-lg-4">Olá, boa tarde! Seja bem vindo {{ Auth::user()->name }}!</p>
          @else
          <p class="fs-4 text-white mb-lg-4">Olá, boa noite! Seja bem vindo {{ Auth::user()->name }}!</p>
          @endif
          @endauth



          {{-- <?php
                if (date('H') > 0 && date("H") < 12) {
                  echo "<p>Bom dia!</p>";
                } elseif (date("H") < 18) {
                  echo "<p>Boa tarde!</p>";
                } else {
                  echo "<p>Boa Noite!</p>";
                }
                ?> --}}

          <h1 class="text-uppercase text-white mb-lg-4">Compre seu primeiro jogo em nosso site</h1>
          <p class="fs-4 text-white mb-lg-4">Aqui você é livre para comprar o jogo que quiser</p>

          <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
            <a href="{{ route('site.produtos') }}" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">CONFIRA OFERTAS</a>
          </div>
    </div>
    <!-- <div class="container py-5">    <div align="right">
      <div style="width:100%" align="right"> <img src="https://s.namemc.com/3d/skin/body.png?id=210e7fc35ee9f005&model=classic&width=282&height=282" alt=""></div></div> -->
  </div>
</div>
</div>
<!-- Hero End -->
<!-- About Start -->
<div class="container-fluid py-5" id="sobre-nos">
  <div class="container">
    <div class="row gx-5">
      <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
        <div class="position-relative h-100">
          <img class="position-absolute w-100 h-100 rounded" src="https://i.ibb.co/jrktn58/4afbcfde0ee98e62ba38cf41a841480b-1-removebg-preview.png" style="object-fit: cover;">
        </div>
      </div>
      <div class="col-lg-7">
        <div class="border-start border-5 border-primary ps-5 mb-5">
          <h6 class="text-primary text-uppercase">Um pouco sobre nós</h6>
          <h1 class="display-5 text-uppercase mb-0">G.A.L</h1>
        </div>
        <h4 class="text-body mb-4"></h4>
        <div class="bg-light p-4">
          <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
            <li class="nav-item w-50" role="presentation">
              <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Politica de Qualidade</button>
            </li>
            <li class="nav-item w-50" role="presentation">
              <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Nosso lema</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
              <p class="mb-0">Trazemos a garantia de ter acesso ao jogo em até 24hrs!!!</p>
            </div>
            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
              <p class="mb-0">Estamos buscando inovar o mercado dos games e para isso estamos sempre evoluindo para chegar a excelência</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- produto começa  -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
      <h6 class="text-primary text-uppercase">Destaques</h6>
      <h1 class="display-5 text-uppercase mb-0">Jogos mais vendidos</h1>
    </div>
    <div class="owl-carousel product-carousel">
      @foreach($produtos as $produto)
      <div class="pb-5">
        <div style="position:flex; align-items:center;" class="product-item position-relative bg-light d-flex flex-column text-center">
          <img class="img-fluid mb-4" style="width: 200px;" src="{{ $produto->imagem }}" alt="">
          <h6 class="text-uppercase">{{ $produto->nome }}</h6>
          <h5 class="text-primary mb-0">R${{ $produto->preco }}</h5>
          <div class="btn-action d-flex justify-content-center">
            @if (Route::has('login'))
            <form action="{{ route('site.carrinho') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_id" value="@auth {{ Auth::user()->id }} @endauth" />
              <input type="hidden" name="produtos_id" value="{{ $produto->id }}" />
              @foreach($compras as $compra)
              <input type="hidden" name="compras_id" value="{{ $compra->id }}" />
              @endforeach
              <input type="hidden" name="nome" value="{{ $produto->nome }}" />
              <input type="hidden" name="preco" value="{{ $produto->preco }}" />
              <input type="hidden" name="imagem" value="{{ $produto->imagem }}" />
              @canany(['admin', 'user'])
              @auth
              <div class="produtoCompra">
                <input style="height: 42px;" type="number" name="quantidade" value="1" max="{{$produto->quantidade}}" />
                <a type="submit" class="btn btn-primary py-2 px-3"><button style="background-color: transparent; border: none;"><i class="bi bi-cart"></i></button></a>
                @endcan
                <a class="btn btn-primary py-2 px-3" href="{{ route('produtosmanager.show', $produto->id) }}"><button style="background-color: transparent; border: none;"><i class="bi bi-eye"></i></button></a>
              </div>

              @else
              <a href="{{ route('login')}}" type="submit" class="btn btn-primary text-color" style="color: #180D2B; font-weight: bold;"><i class="bi bi-cart"></i></a>
              <a class="btn btn-primary py-2 px-3" href="{{ route('produtosmanager.show', $produto->id) }}"><i class="bi bi-eye"></i></a>
              @endauth

            </form>
            @endif

          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
  <div id='component-76145'>
    <div id="featured-products-76145" class="container">
      <!-- Products Section -->

      <!-- COLOCAR PRODUTO AQUI -->

    </div>
  </div>
</div>
<!-- Products End -->
<!-- About End -->

@endsection