<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\Docs;

class CategoriaController extends Controller
{
    public function estructuraOrganizacional()
    {
        $categoriaID = 2; // ← SI ESTA CATEGORÍA ES "Estructura Organizacional"
                          // cámbialo según tu tabla categories

        // Obtener nombre de la categoría
        $categoria = Category::findOrFail($categoriaID);
        $categoriaNombre = $categoria->nombre;

        // Secciones raíz
        $rootSections = Section::where('categoriaID', $categoriaID)
                                ->whereNull('seccionPadreID')
                                ->orderBy('numero')
                                ->get();

        // Árbol completo
        $arbol = $this->generarArbol($categoriaID);

        return view('EstructuraOrg.index', compact(
            'categoriaNombre',
            'rootSections',
            'arbol'
        ));
    }

    private function generarArbol($categoriaID)
    {
        // Todas las secciones
        $secciones = Section::where('categoriaID', $categoriaID)
                            ->orderBy('numero')
                            ->get();

        // Documentos agrupados por sectionID
        $docs = Docs::whereIn('seccionID', $secciones->pluck('numero'))->get()
                    ->groupBy('seccionID');

        // Mapa
        $seccionesMap = [];
        foreach ($secciones as $sec) {
            $seccionesMap[$sec->numero] = $sec;
            $seccionesMap[$sec->numero]->children = [];
            $seccionesMap[$sec->numero]->docs = $docs[$sec->numero] ?? collect();
        }

        // Construcción del árbol
        $root = [];
        foreach ($secciones as $sec) {
            if ($sec->seccionPadreID) {
                $seccionesMap[$sec->seccionPadreID]->children[] = $sec;
            } else {
                $root[] = $sec;
            }
        }

        return $root;
    }
}
