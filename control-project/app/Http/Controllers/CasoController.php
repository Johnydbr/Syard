<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Solicitante;
use App\Models\Pesquisado;
use Illuminate\Http\Request;

class CasoController extends Controller
{
    public function index()
    {
        $casos = Caso::with(['solicitante.empresaSolicitante', 'pesquisado'])->orderBy('id', 'desc')->get();
        return view('casos.index', compact('casos'));
    }

    public function create()
    {
        $solicitantes = Solicitante::orderBy('nome')->get();
        $pesquisados = Pesquisado::orderBy('nome')->get();
        $caso = null;

        return view('casos.create', compact('solicitantes', 'pesquisados', 'caso'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'solicitante_id' => 'required|exists:solicitantes,id',
            'pesquisado_id' => 'required|exists:pesquisados,id',
            'tipo_caso' => 'required|string|max:150',
            'data_abertura' => 'required|date',
            'data_finalizado' => 'nullable|date',
        ]);

        Caso::create(array_merge(
            $request->only(['solicitante_id', 'pesquisado_id', 'tipo_caso', 'data_abertura', 'data_finalizado']),
            [
                'entrevista'     => $request->boolean('entrevista'),
                'copia_hd'       => $request->boolean('copia_hd'),
                'copia_celular'  => $request->boolean('copia_celular'),
                'monitoramento'  => $request->boolean('monitoramento'),
                'pesquisa_campo' => $request->boolean('pesquisa_campo'),
            ]
        ));

        return redirect()->route('casos.index')->with('success', 'Caso criado com sucesso!');
    }

    public function show(Caso $caso)
    {
        return redirect()->route('casos.index');
    }

    public function edit(Caso $caso)
    {
        $solicitantes = Solicitante::orderBy('nome')->get();
        $pesquisados = Pesquisado::orderBy('nome')->get();

        return view('casos.edit', compact('caso', 'solicitantes', 'pesquisados'));
    }

    public function update(Request $request, Caso $caso)
    {
        $request->validate([
            'solicitante_id' => 'required|exists:solicitantes,id',
            'pesquisado_id' => 'required|exists:pesquisados,id',
            'tipo_caso' => 'required|string|max:150',
            'data_abertura' => 'required|date',
            'data_finalizado' => 'nullable|date',
        ]);

        $caso->update(array_merge(
            $request->only(['solicitante_id', 'pesquisado_id', 'tipo_caso', 'data_abertura', 'data_finalizado']),
            [
                'entrevista'     => $request->boolean('entrevista'),
                'copia_hd'       => $request->boolean('copia_hd'),
                'copia_celular'  => $request->boolean('copia_celular'),
                'monitoramento'  => $request->boolean('monitoramento'),
                'pesquisa_campo' => $request->boolean('pesquisa_campo'),
            ]
        ));

        return redirect()->route('casos.index')->with('success', 'Caso atualizado com sucesso!');
    }

    public function destroy(Caso $caso)
    {
        $caso->delete();

        return redirect()->route('casos.index')->with('success', 'Caso removido com sucesso!');
    }
}
