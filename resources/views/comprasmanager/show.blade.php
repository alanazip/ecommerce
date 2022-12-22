@extends('site.layout')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Exibir Compras</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ route('comprasmanager.index') }}">Voltar</a>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $compra->status }}
            </div>
        </div>
    </div>
</div>
@endsection