@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Fornecedor</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a style="margin-left: 100px;" class="btn btn-primary" href="{{ route('fornecedoresmanager.index') }}">Voltar</a>
    <p></p>
    <div style="margin-left: 100px;">
        <div>
            <div  class="form-group">
                <strong>Nome:</strong>
                {{ $fornecedor->nome }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Telefone:</strong>
                {{ $fornecedor->telefone }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>CEP:</strong>
                {{ $fornecedor->cep }}
            </div>
        </div>
        <div class="row">
            <div>
                <div class="form-group">
                    <strong>Logradouro:</strong>
                    {{ $fornecedor->logradouro }}
                </div>
            </div>
            <div>
                <div class="form-group">
                    <strong>Cidade:</strong>
                    {{ $fornecedor->cidade }}
                </div>
            </div>
            <div>
                <div class="form-group">
                    <strong>Estado:</strong>
                    {{ $fornecedor->estado }}
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="form-group">
                        <strong>Razão social:</strong>
                        {{ $fornecedor->razao_social }}
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <strong>Data:</strong>
                        {{ $fornecedor->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection