<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        $produtos = Produto::all();
        return view('site.carrinho', compact('itens', 'produtos'));
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Seu produto foi adicionado com sucesso');
    }

    public function removeCarrinho(Request $request) {
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Seu produto foi removido com sucesso');

    }

    public function atualizaCarrinho(Request $request) {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Seu produto foi atualizado com sucesso');

    }

    public function limpaCarrinho() {
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho foi exluído com sucesso');

    }

    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compras = Compra::all();
        $produtos = Produto::all();

        return view('site.carrinho', compact('compras', 'produtos'));
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
        
        $compras->produtos_id = $request->produtos_id;
        $compras->quantidade = $request->quantidade;
        $compras->preco = $request->preco;

        $compras->save();

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
        Compra::findOrFail($id)->delete();

        return redirect()->route('site.carrinho');
    }

}
