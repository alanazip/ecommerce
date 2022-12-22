@extends('site.layout')

@section('content')
<div>
    <br>
    <h1 class="tittle">Cadastro de Categorias</h1>
    <hr class="my-4">
</div>
<div class="container">
    <a class="btn btn-success font-weight-bold" href="{{ route('categoriasmanager.create') }}">Adicionar Nova Categoria</a>
    <p></p>
    @if ($message = Session::get('success'))
    <p></p>
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered table">
        <tr>
            <th>#</th>
            <th>Categoria:</th>
            <th>Descrição:</th>
        </tr>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->descricao }}</td>
            <td>
                <form action="{{ route('categoriasmanager.destroy', $categoria->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('categoriasmanager.show', $categoria->id) }}">Exibir Detalhes</a>

                    <a class="btn btn-primary" href="{{ route('categoriasmanager.edit', $categoria->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Excluir
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Você deseja excluir esta categoria?</h1>
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

    {!! $categorias->links() !!}
</div>

@endsection