<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nome', 'ASC')->paginate(5);

        return view('categoriasmanager.index', compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $categoria = new Categoria;

        $categoria->nome = $request->nomeCategoria;
        $categoria->descricao = $request->nomeDescricao;

        try {
            $categoria->save();

            return redirect()->action([CategoriaManagerController::class, 'index'])
                                    ->with('msg','Categoria cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->action([CategoriaManagerController::class, 'index'])
                                    ->with('msg','Falha ao criar categoria.');
        }
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->save();

        return view('categoriasmanager.show', compact('categoria'));
    }

    public function create()
    {
        return view('categoriasmanager.create');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categoriasmanager.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $data = $request->all();

        Categoria::findOrFail($id)->update($data);

        return redirect()->route('categoriasmanager.index')->with('success', 'Categorias atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();

        return redirect()->route('categoriasmanager.index')->with('success', 'Categoria excluido com sucesso!');
    }
}
