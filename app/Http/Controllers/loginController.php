<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

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

        // Protección contra fuerza bruta
        $this->checkTooManyFailedAttempts($request);

        // Intentar autenticación usando Auth::attempt() de Laravel
        $credentials = [
            'email' => $request->_id,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerar sesión para prevenir session fixation
            $request->session()->regenerate();

            // Limpiar intentos fallidos
            RateLimiter::clear($this->throttleKey($request));

            $user = Auth::user();

            // Guardar información adicional en sesión si es necesario
            session([
                'user' => [
                    'email' => $user->email,
                    'role' => $user->rol
                ]
            ]);

            // Redirigir según el rol
            if ($user->rol === 'admin') {
                return redirect()->route('admin.landing');
            }

            if ($user->rol === 'usuario') {
                return redirect()->route('usuario.landing');
            }

            // Por defecto, cerrar sesión si no tiene un rol válido
            Auth::logout();
            return back()->with('error', 'Rol de usuario no válido.');
        }

        // Incrementar contador de intentos fallidos
        RateLimiter::hit($this->throttleKey($request));

        return back()->with('error', 'Credenciales incorrectas.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Verificar si hay demasiados intentos fallidos
     */
    protected function checkTooManyFailedAttempts(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            $seconds = RateLimiter::availableIn($this->throttleKey($request));

            throw ValidationException::withMessages([
                '_id' => ["Demasiados intentos de inicio de sesión. Inténtelo de nuevo en {$seconds} segundos."]
            ]);
        }
    }

    /**
     * Obtener clave de throttle para rate limiting
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('_id')) . '|' . $request->ip();
    }
}