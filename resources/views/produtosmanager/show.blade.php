@extends('site.layout')

@section('content')

<div>
    <br>
    <h1 class="tittle">Exibir Jogos</h1>
    <hr class="my-4">
</div>
<div class="container">
    @if (Route::has('login'))
    @csrf
    @auth
    @can('admin')
    <a class="btn btn-primary" href="{{ route('produtosmanager.index') }}">Voltar</a>
    @endcan

    @else
    
    <a class="btn btn-primary" href="{{ route('site.produtos') }}">Voltar</a>
    @endauth
    @endif
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $produto->nome }}
            </div>
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $produto->descricao }}
            </div>
            <div class="form-group">
                <strong>Preço:</strong>
                {{ $produto->preco }}
            </div>
            <div class="form-group">
                <strong>Quantidade:</strong>
                {{ $produto->quantidade }}
            </div>
            <div class="form-group">
                <strong>Categoria:</strong>
                {{ $produto->categoria_id}}
            </div>
            <div class="form-group">
                <strong>Fornecedor:</strong>
                {{ $produto->fornecedor_id }}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Imagem:</strong>
                    <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection