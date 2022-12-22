@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Exibir Categorias</h1>

    <hr class="my-4">
</div>
<div>
    <a style="margin-left: 100px;" class="btn btn-primary" href="{{ route('categoriasmanager.index') }}">Voltar</a>
    <p></p>
    <div class="showCategorias">
        <div>
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $categoria->nome }}
                <br>
                <strong>Descrição:</strong>
                {{ $categoria->descricao }}

            </div>
        </div>
    </div>
</div>
@endsection