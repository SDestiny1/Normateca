<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirige al usuario a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Buscar en la base de datos si el correo ya existe
            $user = DB::table('Usuarios')->where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Si no existe el usuario, dos opciones
                // 1. Rechazar el acceso
                return redirect()->route('login')->withErrors(['login_error' => 'Tu cuenta no está registrada en el sistema.']);
                
                // 2. Crear el usuario automáticamente.
                
                // DB::table('Usuarios')->insert([
                //    'email' => $googleUser->getEmail(),
                //    'rol' => 'usuario',
                //    'contrasena' => '',
                // ]);
                // $user = DB::table('Usuarios')->where('email', $googleUser->getEmail())->first();
    
            }

            // Guardar sesión con rol
            session([
                'user' => [
                    'email' => $user->email,
                    'role' => $user->rol
                ]
            ]);

            // Redirigir según rol
            if ($user->rol === 'admin') {
                return redirect()->route('admin.landing');
            } if ($user->rol === 'usuario') {
                return redirect()->route('usuario.landing');
            }

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['login_error' => 'Error al iniciar sesión con Google.']);
        }
    }
}