<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Compra;
use App\Models\m;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarrinhoManager extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrinhos = Carrinho::all();
        $produtos = Produto::all();

        return view('site.carrinho', compact('carrinhos', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $compras = new Compra;
        $compras->user_id = $request->user_id;
        $compras->status = true;

        $compras->save();

        $carrinho = new Carrinho;
        $carrinho->compras_id = $request->compras_id;
        $carrinho->produtos_id = $request->produtos_id;
        $carrinho->quantidade = $request->quantidade;
        $carrinho->preco = $request->preco;
        $carrinho->imagem = $request->imagem;

        $carrinho->save();

        return redirect()->route('site.carrinho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\m  $m
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Carrinho::findOrFail($id)->delete();

        return redirect()->route('site.carrinho');
    }

}
