<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calendarioController;
use App\Http\Controllers\estructuraController;
use App\Http\Controllers\formatoController;
use App\Http\Controllers\indicadoresController;
use App\Http\Controllers\normatividadController;
use App\Http\Controllers\procesosController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\documentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.post');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/admin', function () {
    return view('admin.landing');
})->name('admin.landing') ->middleware('rol:admin');

Route::get('/usuario', function () {
    return view('usuario.landing');
})->name('usuario.landing' )->middleware('rol:usuario');

// Estructura organizacional
Route::get('/estructura', [estructuraController::class, 'index'])
    ->name('estructura.index');

// Formatos
Route::get('/formato', [formatoController::class, 'index'])
    ->name('formatos.index');

// Indicadores
Route::get('/indicadores', [indicadoresController::class, 'index'])
    ->name('indicadores.index');

// Normatividad
Route::get('/normatividad', [normatividadController::class, 'index'])
    ->name('normatividad.index');

// Procesos
Route::get('/procesos', [procesosController::class, 'index'])
    ->name('procesos.index');

Route::get('/documentos/crear', [documentController::class, 'create'])->name('documentos.create');
Route::post('/documentos', [documentController::class, 'store'])->name('documentos.store');

Route::get('/documentos/secciones/{categoriaID}', [documentController::class, 'obtenerSecciones']);
Route::get('/documentos/subsecciones/{seccionPadreID}', [documentController::class, 'obtenerSubsecciones']);
