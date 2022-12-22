@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Exibir Usuários</h1>

    <hr class="my-4">
</div>
<div>
    <a style="margin-left: 100px;" class="btn btn-primary" href="{{ route('adminmanager.index') }}">Voltar</a>
    <p></p>
    <div>
        <div>
            <div style="margin-left: 100px;" class="form-group">
                <strong>Nome:</strong>
                {{ $user->name }}
                <br>
                <strong>E-mail:</strong>
                {{ $user->email }}

            </div>
        </div>
    </div>
</div>
@endsection