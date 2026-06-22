<?php

namespace App\Http\Controllers;

use App\Models\EmpresaSolicitante;
use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function index()
    {
        $solicitantes = Solicitante::with('empresaSolicitante')->orderBy('id', 'desc')->get();
        return view('solicitantes.index', compact('solicitantes'));
    }

    public function create()
    {
        $empresas = EmpresaSolicitante::orderBy('razao_social')->get();
        return view('solicitantes.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'empresa_solicitante_id' => 'required|exists:empresa_solicitantes,id',
        ]);

        Solicitante::create($request->only(['nome', 'empresa_solicitante_id']));

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante cadastrado com sucesso.');
    }

    public function show(Solicitante $solicitante)
    {
        return redirect()->route('solicitantes.index');
    }

    public function edit(Solicitante $solicitante)
    {
        $empresas = EmpresaSolicitante::orderBy('razao_social')->get();
        return view('solicitantes.edit', compact('solicitante', 'empresas'));
    }

    public function update(Request $request, Solicitante $solicitante)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'empresa_solicitante_id' => 'required|exists:empresa_solicitantes,id',
        ]);

        $solicitante->update($request->only(['nome', 'empresa_solicitante_id']));

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante atualizado com sucesso.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante removido com sucesso.');
    }
}
