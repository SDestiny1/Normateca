<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use App\Models\Documento;

class normatividadController extends Controller
{
    public function index()
    {
        $role = session('user')['role'] ?? null;

        // Obtener la categoría de Estructura Organizacional
        $categoriaID = 3;

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
            return view('admin.Normatividad.index', compact('seccionesPrincipales', 'categoriaID'));
        } 
        elseif ($role === 'usuario') {
            return view('usuario.Normatividad.index', compact('seccionesPrincipales', 'categoriaID'));
        } 
        else {
            return redirect()->route('login');
        }
    }
}