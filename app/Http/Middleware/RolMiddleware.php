<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $rol)
    {
        $user = session('user');

        // Si no hay usuario en sesión
        if (!$user) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        // Si el rol no coincide
        if ($user['role'] !== $rol) {
            return redirect('/login')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}