<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::orderBy('nome', 'ASC')->paginate(5);

        return view('contatosmanager.index', compact('contatos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request) {
        $contato = new Contato;

        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->mensagem = $request->mensagem;
        $contato->status = false;

        try {
            $contato->save();

            return redirect()->action([ContatosController::class, 'index'])
                                    ->with('msg','Mensagem enviada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->action([ContatosController::class, 'index'])
                                    ->with('msg','Falha no envio da mensagem!');
        }
    }


    public function update($id)
    {
        $data = Contato::findOrFail($id);

        $data->status = true;

        Contato::findOrFail($id)->update($data);

        return redirect()->route('contatosmanager.index')->with('success', 'Mensagem lida!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $contato = Contato::findOrFail($id);

        $contato->status = true;

        $contato->save();

        return view('contatosmanager.show', compact('contato'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::findOrFail($id)->delete();

        return redirect()->route('contatosmanager.index')->with('success', 'Mensagem excluida com sucesso!');
    }
}