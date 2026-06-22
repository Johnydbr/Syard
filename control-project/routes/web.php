<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaSolicitanteController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\PesquisadoController;
use App\Http\Controllers\CasoController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('empresas', EmpresaSolicitanteController::class);
Route::resource('solicitantes', SolicitanteController::class);
Route::resource('pesquisados', PesquisadoController::class);
Route::resource('casos', CasoController::class);
