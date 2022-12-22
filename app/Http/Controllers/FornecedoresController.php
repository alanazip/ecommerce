<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index() {
        $fornecedores = Fornecedor::all();

        return view('site.fornecedores', compact('fornecedores'));
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
}
