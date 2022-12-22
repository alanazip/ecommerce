@extends('site.layout')

@section('content')

<div >
  <br>
  <h1 class="tittle">Usuários</h1>
  <hr class="my-4">
</div>

<div class="container">
  @if(session('msg'))
  <p class="msg">{{ session('msg') }}</p>
  <p></p>
  @endif
  <form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nomeCategoria">Nome:</label>
      <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria">
      <br>
      <label for="nomeDescricao">E-mail:</label>
      <input type="text" class="form-control" id="nomeDescricao" name="nomeDescricao">
    </div>
    <br>
    <button type="submit" class="btn btn-primary mb-2" value="Enviar">Enviar</button>
  </form>
  <a class="btn btn-warning" href="{{ route('adminmanager.index') }}">Visualizar Usuários</a>

</div>
<hr>

@endsection