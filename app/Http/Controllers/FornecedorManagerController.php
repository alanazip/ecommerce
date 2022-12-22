<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::orderBy('nome', 'ASC')->paginate(5);

        return view('fornecedoresmanager.index', compact('fornecedores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request) {
        $fornecedor = new Fornecedor;

        $fornecedor->nome = $request->nomeFornecedor;
        $fornecedor->telefone = $request->telFornecedor;
        $fornecedor->logradouro = $request->lograFornecedor;
        $fornecedor->cep = $request->cepFornecedor;
        $fornecedor->cidade = $request->ciFornecedor;
        $fornecedor->estado = $request->estFornecedor;
        $fornecedor->razao_social = $request->razaoFornecedor;

        try {
            $fornecedor->save();

            return redirect()->action([FornecedorManagerController::class, 'index'])
                                    ->with('msg','Fornecedor cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->action([FornecedorManagerController::class, 'index'])
                                    ->with('msg','Falha ao criar fornecedor.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->save();

        return view('fornecedoresmanager.show', compact('fornecedor'));
    }

    public function create()
    {
        return view('fornecedoresmanager.create');
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedoresmanager.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'razao_social' => 'required',
        ]);

        $data = $request->all();

        Fornecedor::findOrFail($id)->update($data);

        return redirect()->route('fornecedoresmanager.index')->with('success', 'fornecedor atualizado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fornecedor::findOrFail($id)->delete();

        return redirect()->route('fornecedoresmanager.index')->with('success', 'Fornecedor excluido com sucesso!');
    }
}
