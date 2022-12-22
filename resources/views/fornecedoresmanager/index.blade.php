@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Fornecedores</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-warning" href="{{ route('fornecedoresmanager.create') }}">Criar novo fornecedor</a>
    <p></p>
    @if ($message = Session::get('success'))
    <p></p>
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Razão Social</th>
            <th width="280px">Data/Hora de Cadastro</th>
        </tr>
        @foreach ($fornecedores as $fornecedor)
        <tr class="col-6">
            <td>{{ ++$i }}</td>
            <td>{{ $fornecedor->nome}}</td>
            <td>{{ $fornecedor->telefone}}</td>
            <td>{{ $fornecedor->cep}}</td>
            <td>{{ $fornecedor->logradouro}}</td>
            <td>{{ $fornecedor->cidade}}</td>
            <td>{{ $fornecedor->estado}}</td>
            <td>{{ $fornecedor->razao_social}}</td>
            <td>{{ $fornecedor->created_at}}</td>
            <td>
                <form action="{{ route('fornecedoresmanager.destroy', $fornecedor->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('fornecedoresmanager.show', $fornecedor->id) }}" value="Exibir">Exibir</a>

                    <a class="btn btn-primary mt-2" href="{{ route('fornecedoresmanager.edit', $fornecedor->id) }}" value="Editar">Editar</a>

                    @csrf
                    @method('DELETE')

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Excluir
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Você deseja excluir este Fornecedor?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $fornecedores->links() !!}
</div>

@endsection