@extends('site.layout')

@section('content')

<style>
    .botao {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .botao:hover {
        background-color: RoyalBlue;
    }
</style>

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="container">

        @if($carrinhos->count() == 0)

        <h3>
            SEU CARRINHO ESTÁ VAZIO!
            <br>
            <a href="{{ route('site.produtos') }}">COMPRE COM A GENTE!</a>
        </h3>

        @else
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Carrinho</h6>
            @if($carrinhos->count() == 1)
            <h1 class="display-5 text-uppercase mb-0">Seu carrinho possui {{$carrinhos->count()}} produto</h1>
            @else
            <h1 class="display-5 text-uppercase mb-0">Seu carrinho possui {{$carrinhos->count()}} produtos</h1>
            @endif
        </div>
        <div class="owl-carousel product-carousel">
            @if ($mensagem = Session::get('sucesso'))

            <button type="button" class="btn btn-outline-success" disabled>{{$mensagem}}</button>
            <br>
            @endif

            @if ($mensagem = Session::get('aviso'))
            {{$mensagem}}
            @endif
            <br>
            <table class="table table-borderless ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">NOME</th>
                        <th scope="col">PREÇO</th>
                        <th scope="col">QUANTIDADE</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrinhos as $carrinho)
                    <tr>
                        @foreach ($produtos as $produto)
                        @if($carrinho->produtos_id == $produto->id)
                        <td><img style="width: 150px;" src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" width="70px" class="responsive-img circle"></td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td><input type="number" name="quantidade" value="{{ $carrinho->quantidade }}" maxlength="{{$produto->quantidade}}"></td>
                        @endif
                        @endforeach
                        <td>
                            <form action="{{ route('carrinho.destroy', $carrinho->id) }}" method="post">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            @endif
        </div>
    </div>
</div>

<!-- Products End -->

@endsection