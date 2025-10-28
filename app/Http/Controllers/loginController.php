<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            '_id' => 'required|email',
            'password' => 'required'
        ]);

        // 🔐 Credenciales estáticas sin base de datos
        $users = [
            'admin@cesun.edu.mx' => [
                'password' => 'admin123',
                'role' => 'admin'
            ],
            'usuario@cesun.edu.mx' => [
                'password' => 'usuario123',
                'role' => 'usuario'
            ],
        ];

        $email = $request->_id;
        $password = $request->password;

        if (isset($users[$email]) && $users[$email]['password'] === $password) {
            // Guardar datos de sesión
            session([
                'user' => [
                    'email' => $email,
                    'role' => $users[$email]['role']
                ]
            ]);

            // Redirigir según el rol
            return $users[$email]['role'] === 'admin'
                ? redirect()->route('admin.landing')
                : redirect()->route('usuario.landing');
        }

        return back()->withErrors(['login_error' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
