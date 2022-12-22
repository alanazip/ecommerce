@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Editar Jogo</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ route('produtosmanager.index') }}">Voltar</a>
    <p></p>
    @if ($errors->any())
        <p></p>
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum problema com a entrada de dados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtosmanager.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="input" name="nome" class="form-control" value="{{ $produto->nome }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <input type="input" name="descricao" class="form-control" value="{{ $produto->descricao }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input type="input" name="preco" class="form-control" value="{{ $produto->preco }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantidade:</strong>
                    <input type="input" name="quantidade" class="form-control" value="{{ $produto->quantidade }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <select name="categoria_id" class="form-control" placeholder="Categoria">
                        @foreach ($data['categorias'] as $categoria)
                        
                        <option value="{{$categoria->id}}"
                        @if ($categoria->id == $produto->categoria_id) 
                            selected 
                        @endif
                        >
                        {{$categoria->nome}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fornecedor:</strong>
                    <select name="fornecedor_id" class="form-control" placeholder="Fornecedor">
                        @foreach ($data['fornecedores'] as $fornecedor)
                        <option value="{{$fornecedor->id}}" 
                        @if ($fornecedor->id == $produto->fornecedor_id) 
                            selected 
                        @endif>
                            {{$fornecedor->nome}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-3 col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
</div>
@endsection
