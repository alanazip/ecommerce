@extends('site.layout')

@section('content')

<head>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <link href="{{ asset('css/search.css') }}" rel="stylesheet">
</head>

<!-- Products Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
      <h3 class="text-primary text-uppercase">Jogos</h3>
      <h1 class="display-5 text-uppercase mb-0">Novidades</h1>
      <form action="{{ route('site.produtos') }}" method="GET">
        <div class="search-container">
          <input type="text" name="search" placeholder="Buscar jogo" class="search-input">
          <a href="#" class="search-btn">
            <i class="fas fa-search"></i>
          </a>
        </div>
      </form>
    </div>
    
    <div class="owl-carousel product-carousel">
      @foreach($produtos as $produto)
      <br><br>
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
                <a type="submit" class="btn btn-primary py-2 px-3" ><button style="background-color: transparent; border: none;"><i class="bi bi-cart"></i></button></a>
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
      @endforeach
      @if(count($produtos) == 0 && $search)
      <h3>NÃO FOI POSSÍVEL ENCONTRAR {{$search}}</h3>
      @endif
    </div>
  </div>
</div>

<!-- Products End -->

@endsection