@extends('site.layout')

@section('content')

<div class="jumbotron">
  <h1 class="display-3 font-weight-bold">Suas compras</h1>
  <hr class="my-3">
  <p class="lead font-weight-bold">Conheça os jogos disponíveis em nossa plataforma.</p>
</div>

<div class="container">
  <!-- START THE FEATURETTES -->
  @foreach($compras as $compra)
  <div class="row featurette-divider">
    <div class="col-md-3">
      <h2 class="lead">{{ $compra->status_id }}</h2>
      <p class="lead">{{ $compra->user_id }}</p>
    </div>
  </div>
  <hr class="featurette-divider">
  @endforeach
</div>

@endsection