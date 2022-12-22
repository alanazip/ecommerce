@extends('site.layout')

@section('content')

<!-- Products Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
      <h6 class="text-primary text-uppercase">Categorias</h6>
      <h1 class="display-5 text-uppercase mb-0">Novidades</h1>
    </div>
    <div class="owl-carousel product-carousel">
      @foreach($categorias as $categoria)
      <div class="pb-5">
        <div class="product-item position-relative bg-light d-flex flex-column text-center">
          <h6 class="text-uppercase">{{ $categoria->nome }}</h6>
          <h5 class="text-primary mb-0">{{ $categoria->descricao }}</h5>
          <div class="btn-action d-flex justify-content-center">
            <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
            <a class="btn btn-primary py-2 px-3" href="{{ route('categoriasmanager.show', $categoria->id) }}"><i class="bi bi-eye"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Products End -->

@endsection