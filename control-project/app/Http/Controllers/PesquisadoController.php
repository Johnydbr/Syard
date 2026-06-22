<?php

namespace App\Http\Controllers;

use App\Models\Pesquisado;
use Illuminate\Http\Request;

class PesquisadoController extends Controller
{
    public function index()
    {
        $pesquisados = Pesquisado::orderBy('id', 'desc')->get();
        return view('pesquisados.index', compact('pesquisados'));
    }

    public function create()
    {
        return view('pesquisados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:50',
            'tipo_de_pesquisado' => 'required|string|max:100',
        ]);

        Pesquisado::create($request->only(['nome', 'documento', 'tipo_de_pesquisado']));

        return redirect()->route('pesquisados.index')->with('success', 'Pesquisado cadastrado com sucesso.');
    }

    public function show(Pesquisado $pesquisado)
    {
        return redirect()->route('pesquisados.index');
    }

    public function edit(Pesquisado $pesquisado)
    {
        return view('pesquisados.edit', compact('pesquisado'));
    }

    public function update(Request $request, Pesquisado $pesquisado)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:50',
            'tipo_de_pesquisado' => 'required|string|max:100',
        ]);

        $pesquisado->update($request->only(['nome', 'documento', 'tipo_de_pesquisado']));

        return redirect()->route('pesquisados.index')->with('success', 'Pesquisado atualizado com sucesso.');
    }

    public function destroy(Pesquisado $pesquisado)
    {
        $pesquisado->delete();

        return redirect()->route('pesquisados.index')->with('success', 'Pesquisado removido com sucesso.');
    }
}
