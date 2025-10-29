<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SeccionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ]);

        $seccion = Section::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id
        ]);

        return response()->json(['success' => true, 'seccion' => $seccion]);
    }
}