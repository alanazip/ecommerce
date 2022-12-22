@extends('site.layout')

@section('content')
<div>
    <h1 class="tittle">Editar Categoria</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ route('categoriasmanager.index') }}">Voltar</a>
    <p></p>
    @if ($errors->any())
        <p></p>
        <div style="color: black;" class="alert alert-danger">
            <strong>Ops!</strong> Houve algum problema com a entrada de dados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categoriasmanager.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="input" name="nome" class="form-control" placeholder="Nome">
                    <br>
                    <strong>Descrição:</strong>
                    <input type="input" name="descricao" class="form-control" placeholder="Descrição">
                    <br>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>


    </form>
</div>
@endsection
