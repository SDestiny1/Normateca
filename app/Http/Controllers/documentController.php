<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docs;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $categorias = Category::orderBy('nombre', 'asc')->get();
        $secciones = Section::orderBy('nombre', 'asc')->get();
        return view('admin.landing', compact('categorias', 'secciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:Categorias,id',
            'seccion_id' => 'nullable|exists:Secciones,id',
            'subseccion_id' => 'nullable|exists:Subsecciones,id',
            'enlace' => 'nullable|url',
            'archivoAdjunto' => 'nullable|file|mimes:pdf,docx,xls,xlsx,csv|max:5120'
        ]);

        $documento = new Docs();
        $documento->nombre = $request->nombre;
        $documento->categoria_id = $request->categoria_id;
        $documento->seccion_id = $request->seccion_id;
        $documento->subseccion_id = $request->subseccion_id;
        $documento->usuario_id = Auth::user()->email;

        if ($request->hasFile('archivoAdjunto')) {
            $path = $request->file('archivoAdjunto')->store('documentos', 'public');
            $documento->urlArchivo = '/storage/' . $path;
        } else {
            $documento->urlArchivo = $request->enlace;
        }

        $documento->save();

        return back()->with('success', 'Documento agregado correctamente.');
    }

    // Endpoint para dependencias dinámicas
    public function getSecciones($categoriaID)
        {
            return response()->json(
                Section::where('categoriaID', $categoriaID)
                    ->whereNull('seccionPadreID')
                    ->get()
            );
        }

    public function getSubsecciones($seccionID)
    {
        return response()->json(
            Section::where('seccionPadreID', $seccionID)->get()
        );
    }
}
