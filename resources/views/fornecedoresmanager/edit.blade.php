@extends('site.layout')

@section('content')
<div>
    <h1 class="tittle">Editar Fornecedor</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ route('fornecedoresmanager.index') }}">Voltar</a>
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

    <form action="{{ route('fornecedoresmanager.update', $fornecedor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group ">
                        <label for="nomeFornecedor">Nome:</label>
                        <input type="text" class="form-control" id="nomeFornecedor" 
                        name="nome" value="{{ $fornecedor->nome }}" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="telFornecedor">Telefone:</label>
                        <input type="text" class="form-control" id="telFornecedor" 
                        name="telefone" value="{{ $fornecedor->telefone }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="cepFornecedor">CEP:</label>
                        <input type="text" class="form-control" id="cepFornecedor" 
                        name="cep" value="{{ $fornecedor->cep }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="lograFornecedor">Logradouro:</label>
                        <input type="logradouro" class="form-control"
                         id="lograFornecedor" name="logradouro" value="{{ $fornecedor->logradouro }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="ciFornecedor">Cidade:</label>
                        <input type="text" class="form-control" id="ciFornecedor" 
                        name="cidade" value="{{ $fornecedor->cidade }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="estFornecedor">Estado:</label>
                        <input type="text" class="form-control" id="estFornecedor" 
                        name="estado" value="{{ $fornecedor->estado }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="razaoFornecedor">Razão social:</label>
                        <input type="razao_social" class="form-control" 
                        id="razao_social" name="razao_social" value="{{ $fornecedor->razao_social }}">
                    </div>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3 text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>


    </form>
</div>
@endsection