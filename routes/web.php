<?php

use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\estructuraController;
use App\Http\Controllers\formatoController;
use App\Http\Controllers\indicadoresController;
use App\Http\Controllers\normatividadController;
use App\Http\Controllers\procesosController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\documentController;

// Rutas para la autenticacion de Google
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.post');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Ruta del login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas del landing page
Route::get('/admin', function () {
    return view('admin.landing');
})->name('admin.landing')->middleware(['auth', 'rol:admin']);

Route::get('/usuario', function () {
    return view('usuario.landing');
})->name('usuario.landing')->middleware(['auth', 'rol:usuario']);

// Rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {
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

    // Rutas de documentos (solo lectura para usuarios autenticados)
    Route::get('/documentos/archivo/{codigo}', [documentController::class, 'archivo'])->name('documento.archivo');
    Route::get('/documentos/secciones/{categoriaID}', [documentController::class, 'obtenerSecciones']);
    Route::get('/documentos/subsecciones/{seccionPadreID}', [documentController::class, 'obtenerSubsecciones']);

    // Rutas para el historial de versiones (solo lectura)
    Route::get('/documentos/{codigo}/version-history', [documentController::class, 'getVersionHistory'])->name('documentos.versionHistory');
    Route::get('/documento-versions/{id}', [documentController::class, 'viewVersion'])->name('documento.viewVersion');
    Route::get('/documento-versions/{id}/archivo', [documentController::class, 'viewVersionFile'])->name('documento.viewVersionFile');
    Route::get('/documento-versions/{id}/download', [documentController::class, 'downloadVersion'])->name('documento.downloadVersion');
    Route::get('/documento-versions/{id}/stream', [documentController::class, 'stream'])->name('documento.stream');
    Route::get('/documento-versions/{id}/download', [documentController::class, 'download'])->name('documento.download');
});

// Rutas de documentos (solo administradores pueden crear, modificar y eliminar)
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/documentos/crear', [documentController::class, 'create'])->name('documentos.create');
    Route::post('/documentos', [documentController::class, 'store'])->name('documentos.store');
    Route::put('/documentos/{codigo}', [documentController::class, 'update'])->name('documentos.update');
    Route::delete('/documentos/{codigo}', [documentController::class, 'destroy'])->name('documentos.destroy');
    Route::post('/documentos/{codigo}/toggle-activo', [documentController::class, 'toggleActivo'])->name('documentos.toggleActivo');
    Route::post('/documentos/secciones', [documentController::class, 'crearSeccion'])->name('documentos.crearSeccion');
    Route::post('/documentos/subsecciones', [documentController::class, 'crearSubseccion'])->name('documentos.crearSubseccion');

    // Rutas de usuarios (solo administradores)
    Route::post('/usuarios', [usuariosController::class, 'store'])->name('usuarios.store');
});