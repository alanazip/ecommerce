@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Editar Categoria</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-primary" href="{{ route('adminmanager.index') }}">Voltar</a>
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

    <form action="{{ route('adminmanager.update', $users) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="input" name="name" class="form-control" 
                        value="{{ $users->name }}">
                    <br>
                    <strong>E-mail:</strong>
                    <input type="input" name="email" class="form-control" 
                        value="{{ $users->email }}">
                    <br>
                    <strong>Permissão</strong>
                    <select name="permission_id" class="form-control">
                        @foreach ($permissions as $permission)
                        <option value="{{$permission->id}}" 
                        @if ($users->hasPermissionTo($permission->id)) 
                            selected 
                        @endif>
                            {{$permission->name}}
                        </option>
                        @endforeach
                    </select>
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
