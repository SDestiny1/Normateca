@php
    // Asignar iconos según el nombre de la sección
    $icono = 'bi-journal-text'; // Icono por defecto
    if (str_contains(strtolower($seccion->nombre), 'proceso')) {
        $icono = 'bi-diagram-3';
    } elseif (str_contains(strtolower($seccion->nombre), 'académic') || str_contains(strtolower($seccion->nombre), 'dirección')) {
        $icono = 'bi-diagram-3';
    } elseif (str_contains(strtolower($seccion->nombre), 'rector')) {
        $icono = 'bi-journal-text';
    }

    // Descripción según el tipo de sección
    if (str_contains(strtolower($seccion->nombre), 'proceso')) {
        $descripcion = 'Estructura por áreas clave';
    } elseif (str_contains(strtolower($seccion->nombre), 'académic') || str_contains(strtolower($seccion->nombre), 'dirección')) {
        $descripcion = 'Estructura por áreas clave';
    } elseif (str_contains(strtolower($seccion->nombre), 'rector')) {
        $descripcion = 'Funciones y responsabilidades';
    } else {
        $descripcion = 'Documentos y normativas';
    }
@endphp

<a class="card h-100 text-decoration-none shadow-sm quick-link-card" href="#{{ Str::slug($seccion->nombre) }}">
    <div class="card-body d-flex align-items-center gap-3">
        <i class="bi {{ $icono }} fs-2 text-primary"></i>
        <div>
            <h5 class="mb-1">{{ $seccion->nombre }}</h5>
            <div class="text-secondary small">{{ $descripcion }}</div>
        </div>
    </div>
</a>