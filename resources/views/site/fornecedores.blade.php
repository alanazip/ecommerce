@extends('site.layout')

@section('content')

<!-- Team Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
      <h6 class="text-primary text-uppercase">Team Members</h6>
      <h1 class="display-5 text-uppercase mb-0">Qualified Pets Care Professionals</h1>
    </div>
    @foreach($fornecedores as $fornecedor)
    <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
      <div class="team-item">
        <div class="position-relative overflow-hidden">
          <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
          <div class="team-overlay">
          </div>
        </div>

        <div class="bg-light text-center p-4">
          <h5 class="text-uppercase">{{ $fornecedor->nome }}</h5>
          <p class="m-0">{{ $fornecedor->cidade }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<!-- Team End -->
<!-- Products Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
      <h6 class="text-primary text-uppercase">Fornecedores</h6>
      <h1 class="display-5 text-uppercase mb-0">Nossos fornecedores</h1>
    </div>
    <div class="owl-carousel product-carousel">
      @foreach($fornecedores as $fornecedor)
      <div class="pb-5">
        <div class="product-item position-relative bg-light d-flex flex-column text-center">
          <h6 class="text-uppercase">{{ $fornecedor->nome }}</h6>
          <h5 class="text-primary mb-0">{{ $fornecedor->cidade }}</h5>
          <div class="btn-action d-flex justify-content-center">
            <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
            <a class="btn btn-primary py-2 px-3" href="{{ route('fornecedoresmanager.show', $fornecedor->id) }}"><i class="bi bi-eye"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<!-- Products End -->

@endsection