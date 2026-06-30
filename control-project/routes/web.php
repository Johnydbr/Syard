<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaSolicitanteController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\PesquisadoController;
use App\Http\Controllers\CasoController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('empresas', EmpresaSolicitanteController::class)
        ->parameters(['empresas' => 'empresaSolicitante']);
    Route::resource('solicitantes', SolicitanteController::class);
    Route::resource('pesquisados', PesquisadoController::class);
    Route::resource('casos', CasoController::class);

    Route::middleware('admin')->resource('admin', AdminController::class)
        ->parameters(['admin' => 'user'])
        ->except(['show']);
});
