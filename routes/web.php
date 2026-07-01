<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

use App\Http\Controllers\InventarioController;

Route::get('/inventario', [InventarioController::class, 'index']);
Route::post('/inventario', [InventarioController::class, 'store']);

use App\Http\Controllers\ReporteController;
Route::get('/reportes', [ReporteController::class, 'index']);

Route::get('/beneficiarios', [BeneficiarioController::class, 'index']);
Route::post('/beneficiarios', [BeneficiarioController::class, 'store']);

Route::put('/beneficiarios/{id}', [BeneficiarioController::class, 'update']);
Route::delete('/beneficiarios/{id}', [BeneficiarioController::class, 'destroy']);

Route::delete('/inventario/{id}', [InventarioController::class, 'destroy']);
Route::put('/inventario/{id}', [InventarioController::class, 'update']);

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::post('/registrar',
    [AuthController::class, 'registrar']);

Route::post('/login',
    [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

use App\Http\Controllers\RacionController;

Route::get('/raciones', [RacionController::class, 'index']);
Route::post('/raciones', [RacionController::class, 'store']);