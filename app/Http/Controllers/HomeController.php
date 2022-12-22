<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $produtos = Produto::all();

        $compras = Compra::all();

        return view('site.home', compact('produtos','compras'));

        
     
    }

    
}
