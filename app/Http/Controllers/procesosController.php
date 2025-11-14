<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use App\Models\Documento;

class procesosController extends Controller
{
    public function index()
    {
        $role = session('user')['role'] ?? null;

        // Obtener la categoría de Estructura Organizacional
        $categoriaID = 1;

        if (!$categoriaID) {
            // Si no existe la categoría, crear una estructura básica para evitar errores
            $seccionesPrincipales = collect();
        } else {
            // Obtener secciones principales de la categoría
            $seccionesPrincipales = Section::where('categoriaID', $categoriaID)
                ->whereNull('seccionPadreID')
                ->with(['documentos', 'subsecciones.documentos'])
                ->get();
        }

        // Pasar los datos a la vista según el rol
        if ($role === 'admin') {
            return view('admin.Procesos.index', compact('seccionesPrincipales', 'categoriaID'));
        } 
        elseif ($role === 'usuario') {
            return view('usuario.Procesos.index', compact('seccionesPrincipales', 'categoriaID'));
        } 
        else {
            return redirect()->route('login');
        }
    }
}