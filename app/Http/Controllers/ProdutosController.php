<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
     public function index()
    {

        $search = request('search');

        $compras = Compra::all();

        if($search) {
            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $produtos = Produto::all();
        }

        return view('site.produtos', compact('produtos', 'compras'), ['produtos' => $produtos, 'search' => $search])
            ->with('i', (request()->input('page', 1) - 1) * 5, );
    }
}
