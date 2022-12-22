@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Mensagem</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a style="margin-left: 100px;" class="btn btn-primary" href="{{ route('contatosmanager.index') }}">Voltar</a>
    <p></p>
    <div>
        <div>
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $contato->nome }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Mensagem:</strong>
                {{ $contato->mensagem }}
            </div>
        </div>
        <div>
            <div class="form-group">
                <strong>Data:</strong>
                {{ $contato->updated_at }}
            </div>
        </div>
    </div>
</div>
@endsection