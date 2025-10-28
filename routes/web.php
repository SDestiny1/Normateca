<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calendarioController;
use App\Http\Controllers\estructuraController;
use App\Http\Controllers\formatoController;
use App\Http\Controllers\indicadoresController;
use App\Http\Controllers\normatividadController;
use App\Http\Controllers\procesosController;
use App\Http\Controllers\loginController;

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

Route::get('/', function () {
    return redirect()->route('login');
});


// Vistas por rol
Route::get('/admin', function () {
    if (session('user')['role'] !== 'admin') {
        return redirect()->route('login');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/usuario', function () {
    if (session('user')['role'] !== 'usuario') {
        return redirect()->route('login');
    }
    return view('usuario.dashboard');
})->name('usuario.dashboard');

// 🧩 Nueva ruta para el landing del admin
Route::get('/admin/landing', function () {
    if (!session()->has('user') || session('user')['role'] !== 'admin') {
        return redirect()->route('login');
    }
    return view('admin.landing'); // vista: resources/views/admin/landing.blade.php
})->name('admin.landing');

Route::get('/usuario/landing', function () {
    if (!session()->has('user') || session('user')['role'] !== 'usuario') {
        return redirect()->route('login');
    }
    return view('usuario.landing'); // vista: resources/views/admin/landing.blade.php
})->name('usuario.landing');

// Estructura organizacional
Route::get('/estructura', function () {
    $role = session('user')['role'] ?? null;

    if ($role === 'admin') {
        return view('admin.EstructuraOrg.index');
    } elseif ($role === 'usuario') {
        return view('usuario.EstructuraOrg.index');
    } else {
        return redirect()->route('login');
    }
})->name('estructura.index');

// Formatos
Route::get('/formato', function () {
    $role = session('user')['role'] ?? null;

    if ($role === 'admin') {
        return view('admin.Formato.index');
    } elseif ($role === 'usuario') {
        return view('usuario.Formato.index');
    } else {
        return redirect()->route('login');
    }
})->name('formatos.index');

// Indicadores
Route::get('/indicadores', function () {
    $role = session('user')['role'] ?? null;

    if ($role === 'admin') {
        return view('admin.Indicadores.index');
    } elseif ($role === 'usuario') {
        return view('usuario.Indicadores.index');
    } else {
        return redirect()->route('login');
    }
})->name('indicadores.index');

// Normatividad
Route::get('/normatividad', function () {
    $role = session('user')['role'] ?? null;

    if ($role === 'admin') {
        return view('admin.Normatividad.index');
    } elseif ($role === 'usuario') {
        return view('usuario.Normatividad.index');
    } else {
        return redirect()->route('login');
    }
})->name('normatividad.index');

// Procesos
Route::get('/procesos', function () {
    $role = session('user')['role'] ?? null;

    if ($role === 'admin') {
        return view('admin.Procesos.index');
    } elseif ($role === 'usuario') {
        return view('usuario.Procesos.index');
    } else {
        return redirect()->route('login');
    }
})->name('procesos.index');