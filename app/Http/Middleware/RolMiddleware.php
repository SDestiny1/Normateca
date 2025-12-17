<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $rol)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        $user = Auth::user();

        // Si el rol no coincide
        if ($user->rol !== $rol) {
            return redirect('/login')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}