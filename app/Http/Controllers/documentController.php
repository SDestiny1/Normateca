<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\User;
use App\Models\Docs;
use App\Models\DocumentVersion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class documentController extends Controller
{
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        $usuarios = User::orderBy('email')->get();
        return view('documentos.create', compact('categorias', 'usuarios'));
    }

    // AJAX: obtener secciones por categoría
    public function obtenerSecciones($categoriaID)
    {
        $secciones = Section::where('categoriaID', $categoriaID)
            ->whereNull('seccionPadreID')
            ->orderBy('nombre')->get();
        return response()->json($secciones);
    }

    // AJAX: obtener subsecciones por sección padre
    public function obtenerSubsecciones($seccionPadreID)
    {
        $subsecciones = Section::where('seccionPadreID', $seccionPadreID)
            ->orderBy('nombre')->get();
        return response()->json($subsecciones);
    }

    // Guardar documento
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'url' => 'nullable|url',
            'archivo' => 'nullable|file|max:51200',
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
            'archivo' => 'nullable|file|max:51200',
            'categoriaID' => 'nullable|integer',
            'usuarioID' => 'nullable|integer',
        ]);

        $doc = Docs::where('codigo', $codigo)->first();
        if (!$doc) {
            abort(404);
        }

        // Verificar si hay cambios en el archivo
        $nuevoArchivo = null;
        $archivoActualizado = false;

        if ($request->hasFile('archivo')) {
            $nuevoArchivo = file_get_contents($request->file('archivo')->getRealPath());

            // Si el archivo cambió, guardar versión anterior
            if ($doc->archivo && $nuevoArchivo !== $doc->archivo) {
                $archivoActualizado = true;
                $nextVersionNumber = DocumentVersion::getNextVersionNumber($codigo);

                DocumentVersion::create([
                    'codigo' => $codigo,
                    'archivo' => $doc->archivo,
                    'version_number' => $nextVersionNumber,
                    'cambios_descripcion' => $request->input('cambios_descripcion', 'Cambios no especificados'),
                    'usuarioID' => auth()->check() ? auth()->id() : $doc->usuarioID,
                    'created_at' => now(),
                ]);
            }

            $doc->archivo = $nuevoArchivo;
        }

        if ($request->filled('titulo')) {
            $doc->titulo = $request->titulo;
        }

        if ($request->filled('url')) {
            $doc->url = $request->url;
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

        $mensaje = $archivoActualizado
            ? '✅ Documento actualizado correctamente. Versión anterior guardada.'
            : '✅ Documento actualizado correctamente.';

        return back()->with('mensaje', $mensaje);
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

    /**
     * Obtener el historial de versiones de un documento (AJAX)
     */
    public function getVersionHistory($codigo)
    {
        $doc = Docs::find($codigo);
        if (!$doc) {
            return response()->json(['success' => false, 'mensaje' => 'Documento no encontrado'], 404);
        }

        $versiones = $doc->versiones()
            ->with('usuario')
            ->orderBy('version_number', 'desc')
            ->get()
            ->map(function ($version) {
                return [
                    'id' => $version->id,
                    'version_number' => $version->version_number,
                    'cambios_descripcion' => $version->cambios_descripcion,
                    'usuario' => $version->usuario->email ?? 'Sistema',
                    'created_at' => ($version->created_at)
                        ? $version->created_at->setTimezone(config('app.timezone', date_default_timezone_get()))->format('d/m/Y H:i')
                        : null,
                ];
            });

        return response()->json([
            'success' => true,
            'total_versiones' => count($versiones),
            'versiones' => $versiones,
        ]);
    }

    /**
     * Descargar una versión anterior del documento
     */
    public function downloadVersion($id)
    {
        // Aumentar memory_limit temporalmente para archivos grandes
        $originalMemory = ini_get('memory_limit');
        ini_set('memory_limit', '512M');

        $version = DocumentVersion::find($id);
        if (!$version || !$version->archivo) {
            ini_set('memory_limit', $originalMemory);
            abort(404, 'Versión no encontrada');
        }

        $doc = $version->documento;
        $content = $version->archivo;

        // Intentar detectar el tipo MIME
        $mime = 'application/pdf';
        if (function_exists('finfo_open')) {
            $f = finfo_open(FILEINFO_MIME_TYPE);
            $detected = finfo_buffer($f, $content);
            if ($detected) {
                $mime = $detected;
            }
            finfo_close($f);
        }

        $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $doc->titulo ?: $doc->codigo) . '_v' . $version->version_number . '.pdf';

        // Obtener tamaño del contenido
        $total = is_string($content) ? strlen($content) : 0;

        // Devolver como descarga directa (respuesta simple sin streaming para descarga rápida)
        $response = response($content, 200)
            ->header('Content-Type', $mime)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        if ($total > 0) {
            $response->header('Content-Length', $total);
        }

        return $response;
    }

    /**
     * Ver una versión anterior en un iframe modal (AJAX) - Retorna base64
     */
    public function viewVersion($id)
    {
        // Aumentar memory_limit temporalmente para archivos grandes
        $originalMemory = ini_get('memory_limit');
        ini_set('memory_limit', '512M');

        $version = DocumentVersion::find($id);
        if (!$version || !$version->archivo) {
            ini_set('memory_limit', $originalMemory);
            return response()->json(['success' => false, 'mensaje' => 'Versión no encontrada'], 404);
        }

        $content = $version->archivo;

        // Intentar detectar el tipo MIME
        $mime = 'application/pdf';
        if (function_exists('finfo_open')) {
            $f = finfo_open(FILEINFO_MIME_TYPE);
            $detected = finfo_buffer($f, $content);
            if ($detected) {
                $mime = $detected;
            }
            finfo_close($f);
        }

        $base64 = base64_encode($content);

        ini_set('memory_limit', $originalMemory);

        return response()->json([
            'success' => true,
            'data' => 'data:' . $mime . ';base64,' . $base64,
            'version_number' => $version->version_number,
            'titulo' => $version->documento->titulo,
        ]);
    }

    /**
     * Servir el archivo de una versión para mostrar en inline (iframe/embed)
     * Con streaming para archivos grandes
     */
    public function viewVersionFile(Request $request, $id)
    {
        // Aumentar memory_limit temporalmente para archivos grandes
        $originalMemory = ini_get('memory_limit');
        ini_set('memory_limit', '512M');

        $version = DocumentVersion::find($id);
        if (!$version || !$version->archivo) {
            ini_set('memory_limit', $originalMemory);
            abort(404, 'Versión no encontrada');
        }

        $doc = $version->documento;
        $content = $version->archivo;

        // Detectar tipo MIME
        $mime = 'application/pdf';
        if (function_exists('finfo_open')) {
            $f = finfo_open(FILEINFO_MIME_TYPE);
            $detected = finfo_buffer($f, $content);
            if ($detected) {
                $mime = $detected;
            }
            finfo_close($f);
        }

        $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $doc->titulo ?: $doc->codigo) . '_v' . $version->version_number . '.pdf';

        // Obtener tamaño del contenido
        $total = is_string($content) ? strlen($content) : 0;

        // Para archivos grandes, usar streaming
        $callback = function () use ($content) {
            echo $content;
            if (function_exists('ob_flush'))
                ob_flush();
            if (function_exists('flush'))
                flush();
        };

        $response = new StreamedResponse($callback, 200);
        $response->headers->set('Content-Type', $mime);
        $response->headers->set('Content-Disposition', 'inline; filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        // Enviar Content-Length si es posible
        if ($total > 0) {
            $response->headers->set('Content-Length', $total);
        }

        return $response;
    }

    public function stream($id)
    {
        $version = DocumentVersion::findOrFail($id);

        $contenido = $version->archivo; // Ajusta el nombre de tu campo

        // Si está en base64 lo decodificamos
        if ($this->isBase64($contenido)) {
            $contenido = base64_decode($contenido);
        }

        return response($contenido, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="documento.pdf"'
        ]);
    }



    public function download($id)
    {
        $version = DocumentVersion::findOrFail($id);

        $contenido = $version->archivo;

        // Si está en base64, decodificar
        if ($this->isBase64($contenido)) {
            $contenido = base64_decode($contenido);
        }

        $doc = $version->documento;

        // Construir nombre de archivo: titulo_vX.pdf
        $filename = preg_replace(
            '/[^A-Za-z0-9_\-\.]/',
            '_',
            $doc->titulo ?: $doc->codigo
        )
            . '_v' . $version->version_number . '.pdf';

        return response($contenido)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }


    private function isBase64($string)
    {
        return base64_encode(base64_decode($string, true)) === $string;
    }
}
