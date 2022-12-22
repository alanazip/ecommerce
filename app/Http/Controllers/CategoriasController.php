<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index() {
        $categorias = Categoria::all();

        return view('site.categorias', compact('categorias'));
    }

    public function store(Request $request) {
        $categoria = new Categoria;

        $categoria->nome = $request->nomeCategoria;
        $categoria->descricao = $request->nomeDescricao;

        try {
            $categoria->save();

            return redirect()->action([CategoriasController::class, 'index'])
                                    ->with('msg','Categoria cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->action([CategoriasController::class, 'index'])
                                    ->with('msg','Falha ao criar categoria.');
        }
    }

    public function create()
    {
        return view('categoriasmanager.create');
    }
}
