<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaVirtualController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/entregas/filtro', [AulaVirtualController::class, 'filtrarEntregas'])->name('entregas.filtro');
Route::get('/reporte', [AulaVirtualController::class, 'reporte'])->name('reporte');
Route::get('/ranking', [AulaVirtualController::class, 'ranking'])->name('ranking');