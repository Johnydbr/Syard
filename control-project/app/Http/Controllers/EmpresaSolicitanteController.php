<?php

namespace App\Http\Controllers;

use App\Models\EmpresaSolicitante;
use Illuminate\Http\Request;

class EmpresaSolicitanteController extends Controller
{
    public function index()
    {
        $empresas = EmpresaSolicitante::orderBy('id', 'desc')->get();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:30|unique:empresa_solicitantes,cnpj',
        ]);

        EmpresaSolicitante::create($request->only(['razao_social', 'cnpj']));

        return redirect()->route('empresas.index')->with('success', 'Empresa cadastrada com sucesso.');
    }

    public function show(EmpresaSolicitante $empresaSolicitante)
    {
        return redirect()->route('empresas.index');
    }

    public function edit(EmpresaSolicitante $empresaSolicitante)
    {
        return view('empresas.edit', compact('empresaSolicitante'));
    }

    public function update(Request $request, EmpresaSolicitante $empresaSolicitante)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:30|unique:empresa_solicitantes,cnpj,' . $empresaSolicitante->id,
        ]);

        $empresaSolicitante->update($request->only(['razao_social', 'cnpj']));

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso.');
    }

    public function destroy(EmpresaSolicitante $empresaSolicitante)
    {
        $empresaSolicitante->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa removida com sucesso.');
    }
}
