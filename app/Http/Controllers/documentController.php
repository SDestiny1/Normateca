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
            'estado' => 'activo'
        ]);

        return back()->with('mensaje', '✅ Documento agregado correctamente.');
    }

    // Servir el archivo BLOB del documento para vista en iframe
    public function archivo($codigo)
    {
        $doc = Docs::find($codigo);
        if (!$doc || !$doc->archivo) {
            abort(404);
        }

        $content = $doc->archivo;

        // Intentar detectar el tipo MIME, por defecto usar application/pdf
        $mime = 'application/pdf';
        if (function_exists('finfo_open')) {
            $f = finfo_open(FILEINFO_MIME_TYPE);
            $detected = finfo_buffer($f, $content);
            if ($detected) {
                $mime = $detected;
            }
            finfo_close($f);
        }

        $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $doc->titulo ?: $codigo) . '.pdf';

        return response($content, 200)
            ->header('Content-Type', $mime)
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    } 

    // Actualizar documento (por código)
    public function update(Request $request, $codigo)
    {
        $request->validate([
            'titulo' => 'nullable|string|max:255',
            'url' => 'nullable|url',
            'archivo' => 'nullable|file|max:5120',
            'categoriaID' => 'nullable|integer',
            'usuarioID' => 'nullable|integer',
        ]);

        $doc = Docs::where('codigo', $codigo)->first();
        if (!$doc) {
            abort(404);
        }

        if ($request->filled('titulo')) {
            $doc->titulo = $request->titulo;
        }

        if ($request->filled('url')) {
            $doc->url = $request->url;
        }

        if ($request->hasFile('archivo')) {
            $doc->archivo = file_get_contents($request->file('archivo')->getRealPath());
        }

        if ($request->filled('usuarioID')) {
            $doc->usuarioID = $request->usuarioID;
        }

        if ($request->filled('categoriaID')) {
            $doc->categoriaID = $request->categoriaID;
        }

        // Manejar sección/subsección si se envían
        if ($request->filled('subseccionID')) {
            $doc->seccionID = $request->subseccionID;
        } elseif ($request->filled('seccionID')) {
            $doc->seccionID = $request->seccionID;
        }

        $doc->save();

        return back()->with('mensaje', '✅ Documento actualizado correctamente.');
    }

    // Eliminar documento (por código)
    public function destroy($codigo)
    {
        $doc = Docs::where('codigo', $codigo)->first();
        if (!$doc) {
            abort(404);
        }

        $titulo = $doc->titulo;
        $doc->delete();

        return back()->with('mensaje', '✅ Documento "' . $titulo . '" eliminado correctamente.');
    }

    // Desactivar/Activar documento
    public function toggleActivo(Request $request, $codigo)
    {
        try {
            $doc = Docs::where('codigo', $codigo)->first();
            if (!$doc) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'mensaje' => 'Documento no encontrado'], 404);
                }
                abort(404);
            }

            // Cambiar entre 'activo' y 'desactivo' - manejar diferentes valores posibles
            $nuevoEstado = ($doc->estado === 'activo' || $doc->estado === '1' || $doc->estado === true) ? 'desactivo' : 'activo';
            $doc->estado = $nuevoEstado;
            $doc->save();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'activo' => $doc->estado,
                    'mensaje' => 'Documento "' . $doc->titulo . '" ' . $doc->estado . ' correctamente.'
                ]);
            }

            return back()->with('mensaje', '✅ Documento "' . $doc->titulo . '" ' . $doc->estado . ' correctamente.');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'mensaje' => 'Error: ' . $e->getMessage()], 500);
            }
            return back()->with('error', 'Error al cambiar estado: ' . $e->getMessage());
        }
    }
}