@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Cadastro de Jogos</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-success font-weight-bold" href="{{ route('produtosmanager.create') }}">Adicionar Novo Jogo</a>
    <p></p>
    @if ($message = Session::get('success'))
    <p></p>
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered text-black">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Preco</th>
            <th>Quantidade</th>
            <th>Fornecedor</th>
            <th></th>
        </tr>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->preco }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>{{ $produto->fornecedor_id }}</td>
            <td>
                <form action="{{ route('produtosmanager.destroy', $produto->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('produtosmanager.show', $produto->id) }}">Exibir Detalhes</a>

                    <a class="btn btn-primary" href="{{ route('produtosmanager.edit', $produto->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Excluir
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Você deseja excluir este Jogo?</h1>
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

    {!! $produtos->links() !!}
</div>

@endsection