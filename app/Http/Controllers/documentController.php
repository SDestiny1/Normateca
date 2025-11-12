<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\User;
use App\Models\Docs;
use Illuminate\Http\Request;

class documentController extends Controller
{
    public function create() {
        $categorias = Category::orderBy('nombre')->get();
        $usuarios = User::orderBy('email')->get();
        return view('documentos.create', compact('categorias', 'usuarios'));
    }

    // AJAX: obtener secciones por categoría
    public function obtenerSecciones($categoriaID) {
        $secciones = Section::where('categoriaID', $categoriaID)
            ->whereNull('seccionPadreID')
            ->orderBy('nombre')->get();
        return response()->json($secciones);
    }

    // AJAX: obtener subsecciones por sección padre
    public function obtenerSubsecciones($seccionPadreID) {
        $subsecciones = Section::where('seccionPadreID', $seccionPadreID)
            ->orderBy('nombre')->get();
        return response()->json($subsecciones);
    }

    // Guardar documento
    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'url' => 'nullable|url',
            'archivo' => 'nullable|file|max:5120',
            'usuarioID' => 'required|integer',
            'categoriaID' => 'required|integer',
        ]);

        $codigo = uniqid("DOC_");
        $archivo = null;

        if ($request->hasFile('archivo')) {
            $archivo = file_get_contents($request->file('archivo')->getRealPath());
        }

        $seccionID = $request->subseccionID ?: $request->seccionID ?: null;

        Docs::create([
            'codigo' => $codigo,
            'titulo' => $request->titulo,
            'url' => $request->url,
            'archivo' => $archivo,
            'usuarioID' => $request->usuarioID,
            'categoriaID' => $request->categoriaID,
            'seccionID' => $seccionID,
        ]);

        return back()->with('mensaje', '✅ Documento agregado correctamente.');
    }
}
