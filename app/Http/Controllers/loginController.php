<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Buscar el usuario en la base de datos
        $user = DB::table('Usuarios')
            ->where('email', $request->_id)
            ->first();

        // Si no existe el usuario o la contraseña no coincide
        if (!$user || $user->contrasena !== $request->password) {
            return back()->withErrors(['login_error' => 'Credenciales incorrectas.']);
        }

        // Guardar sesión con datos reales
        session([
            'user' => [
                'email' => $user->email,
                'role' => $user->rol
            ]
        ]);

        // Redirigir según el rol
        if ($user->rol === 'admin') {
            return redirect()->route('admin.landing');
        } if ($user->rol === 'usuario') {
            return redirect()->route('usuario.landing');
        }
}

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
