<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usuariosController extends Controller 
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'contrasena' => 'required|string|min:8|confirmed',
            'rol' => 'required|string|in:admin,user,editor',
        ]);

        User::create([
            'email' => $request->email,
            'contrasena' => bcrypt($request->contrasena),
            'rol' => $request->rol,
        ]);

        return redirect()->back()->with('success', 'Usuario creado exitosamente.');
    }
}   