<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\EmpresaSolicitante;
use App\Models\Pesquisado;
use App\Models\Solicitante;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmpresas = EmpresaSolicitante::count();
        $totalSolicitantes = Solicitante::count();
        $totalPesquisados = Pesquisado::count();
        $totalCasos = Caso::count();

        $recentCases = Caso::with(['solicitante.empresaSolicitante', 'pesquisado'])
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        return view('dashboard', compact(
            'totalEmpresas',
            'totalSolicitantes',
            'totalPesquisados',
            'totalCasos',
            'recentCases'
        ));
    }
}
