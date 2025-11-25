<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Normateca Institucional</title>
    <meta name="description" content="Plataforma para la consulta y difusión de las disposiciones administrativas internas de CESUN Universidad">
    <meta name="keywords" content="normateca, normatividad, disposiciones administrativas, CESUN Universidad, gestión de calidad, simplificación normativa">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <style>
      :root { --brand: #0b5ed7; }
      .hero{
        background: radial-gradient(60% 100% at 70% 10%, rgba(13,110,253,.12), transparent 60%),
                    linear-gradient(120deg, rgba(13,110,253,.18), rgba(102,16,242,.12));
        border-bottom: 1px solid rgba(0,0,0,.06);
      }
      .list-hover .list-group-item{ transition: background-color .15s ease; }
      .list-hover .list-group-item:hover{ background-color: rgba(13,110,253,.06); }
      .section-anchor{ scroll-margin-top: 6rem; }

      .subsection-title {
        background-color: #f8f9fa;
        font-weight: bold;
        text-transform: uppercase;
      }
      .sub-item { padding-left: 2rem; }

      .doc-container a.fw-semibold {
        color: #0d6efd;               
        text-decoration: underline;   
        text-underline-offset: 2px;   
        font-weight: 600;
        transition: color 0.2s ease;
      }

      .doc-container a.fw-semibold:hover {
        color: #0a58ca;              
        text-decoration: underline; 
      }

      .toggle-btn {
        border: none; background: none; color: var(--brand);
        font-size: 0.9rem; cursor: pointer;
        display: flex; align-items: center; gap: 0.25rem;
        transition: color 0.2s ease;
      }
      .toggle-btn:hover { color: #084298; }

      .arrow { display: inline-block; transition: transform 0.3s ease; }
      .arrow.down { transform: rotate(0deg); }
      .arrow.up { transform: rotate(180deg); }

      .collapsible { max-height: 2000px; overflow: hidden; transition: max-height 0.4s ease-in-out; }
      .collapsible.hidden { max-height: 0; }

      /* ---- Preview flotante ---- */
        #globalPreview {
          display: none; 
          position: fixed; /* Cambiado de absolute a fixed */
          width: 380px; 
          background: #fff; 
          border: 1px solid #ddd;
          border-radius: 12px; 
          box-shadow: 0 8px 25px rgba(0,0,0,0.15); 
          padding: 15px; 
          z-index: 9999;
          transition: opacity 0.2s ease;
          pointer-events: auto; /* Permitir interacción */
      }
      #globalPreview .doc-title { 
          font-size: 14px; 
          font-weight: 600; 
          color: #1a73e8; 
          margin-bottom: 12px; 
          display: flex; 
          align-items: center; 
          gap: 6px; 
          line-height: 1.3;
      }
      #globalPreview .doc-title::before { 
          content: "📄"; 
          font-size: 16px; 
          flex-shrink: 0;
      }
      #globalPreview .doc-frame { 
          width: 100%; 
          height: 220px; 
          border: 1px solid #e0e0e0; 
          border-radius: 8px; 
          margin-bottom: 12px; 
          background: #f8f9fa;
      }
      #globalPreview .doc-info { 
          font-size: 12px; 
          color: #666; 
          line-height: 1.4;
          padding: 8px 0;
          border-top: 1px solid #f0f0f0;
      }

      /* Asegurar que el contenedor del documento permita el hover correctamente */
      .doc-container { 
          cursor: pointer; 
          position: relative;
          display: block;
      }

      .doc-meta {
          font-size: 12px;
          color: #666;
          margin-top: 4px;
      }

      /* ---- Botón flotante "Volver arriba" ---- */
      .scroll-top-btn {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 50px;
        height: 50px;
        background-color: var(--brand);
        color: white;
        border: none;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        display: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        z-index: 1050;
      }
      .scroll-top-btn:hover {
        background-color: #084298;
        transform: translateY(-3px);
      }
      .scroll-top-btn i {
        font-size: 1.3rem;
      }

      /* ---- Estilos responsivos para los links rápidos ---- */
      .quick-links-container {
        display: flex;
        justify-content: center;
      }
      .quick-links-row {
        max-width: 1200px;
        width: 100%;
      }
      .quick-link-card {
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }
      .quick-link-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1) !important;
      }

      .floating-buttons {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 9999;
        align-items: flex-end;
      }

      .float-btn {
      background-color: #0d6efd;
      color: white;
      border: none;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      font-size: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.25);
      transition: all 0.3s ease;
    }

    .float-btn:hover {
      background-color: #0b5ed7;
      transform: scale(1.1);
    }

    #btn-add-user,
    #btn-add-doc {
      opacity: 1;
      pointer-events: all;
      transform: translateY(0);
    }

    .show-scroll .floating-buttons {
      bottom: 90px;
    }
  </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Normateca Institucional Admin</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('admin.landing') }}" class="">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('estructura.index') }}" class="nav-link">Estructura Organizacional</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('normatividad.index') }}" class="nav-link">Normatividad</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('indicadores.index') }}" class="nav-link">Indicadores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('procesos.index') }}" class="nav-link">Procesos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('formatos.index') }}" class="nav-link active">Formatos</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!---- Hero Section ---->
        <section id="hero" class="hero section">
            <img src="{{ asset('assets/img/Mesa de trabajo 1-80.jpg') }}" alt="" class="img-fluid w-100">
        </section>

        <!---- Links rápidos ---->
        <div class="container my-5">
            <div class="quick-links-container">
                <div class="quick-links-row">
                    <div class="row justify-content-center g-4">
                        @php
                            $totalSecciones = count($seccionesPrincipales);
                        @endphp
                        
                        @if($totalSecciones == 1)
                            {{-- 1 sección: Centrada --}}
                            <div class="col-12 col-md-6 col-lg-4">
                                @include('partials.quick-link-card', ['seccion' => $seccionesPrincipales[0]])
                            </div>
                        
                        @elseif($totalSecciones == 2)
                            {{-- 2 secciones: Centradas una al lado de la otra --}}
                            @foreach($seccionesPrincipales as $seccion)
                                <div class="col-12 col-md-6 col-lg-5">
                                    @include('partials.quick-link-card', ['seccion' => $seccion])
                                </div>
                            @endforeach
                        
                        @elseif($totalSecciones == 3)
                            {{-- 3 secciones: Una fila completa --}}
                            @foreach($seccionesPrincipales as $seccion)
                                <div class="col-12 col-md-6 col-lg-4">
                                    @include('partials.quick-link-card', ['seccion' => $seccion])
                                </div>
                            @endforeach
                        
                        @elseif($totalSecciones == 4)
                            {{-- 4 secciones: 2 filas de 2 --}}
                            <div class="col-12 col-md-6">
                                <div class="row g-4">
                                    @foreach($seccionesPrincipales as $index => $seccion)
                                        <div class="col-12 col-lg-6">
                                            @include('partials.quick-link-card', ['seccion' => $seccion])
                                        </div>
                                        @if($index == 1)
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row g-4">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        
                        @else
                            {{-- 5 o más secciones: Grid responsivo --}}
                            @foreach($seccionesPrincipales as $seccion)
                                <div class="col-12 col-md-6 col-lg-4">
                                    @include('partials.quick-link-card', ['seccion' => $seccion])
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!---- Secciones ---->
<div class="container-fluid px-5 my-5">
    @foreach($seccionesPrincipales as $seccion)
        <div id="{{ Str::slug($seccion->nombre) }}" class="section-anchor mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-2">{{ $seccion->nombre }}</h3>
                <button class="toggle-btn" data-target="list{{ Str::studly($seccion->nombre) }}">
                    <span class="label">Ocultar</span>
                    <i class="bi bi-chevron-down arrow down"></i>
                </button>
            </div>
            <ul class="list-group list-group-flush list-hover collapsible" id="list{{ Str::studly($seccion->nombre) }}">
                @foreach($seccion->documentos as $documento)
    <li class="list-group-item doc-container d-flex justify-content-between align-items-start align-items-center" data-codigo="{{ $documento->codigo }}">
        <div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ $documento->url ?: '#' }}" target="_blank"
                    class="fw-semibold text-decoration-none doc-link {{ $documento->url && $documento->url != '#' ? '' : 'text-muted' }} {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : '' }}"
                    data-preview="{{ $documento->urlPreview ?: ($documento->url ?: '') }}"
                    data-edit="{{ $documento->urlEdit ?: ($documento->url ?: '') }}"
                    data-area="{{ $documento->area ?: '' }}"
                    data-type="{{ $documento->tipo ?: '' }}"
                    data-archivo="{{ $documento->archivo ? $documento->archivo : '' }}"
                    data-activo="{{ $documento->estado ?? 'activo' }}">
                    {{ $documento->titulo }}
                </a>
                @if($documento->archivo)
                    <button class="btn btn-sm p-0 ms-2 open-pdf" data-archivo="{{ route('documento.archivo', ['codigo' => $documento->codigo]) }}" title="Ver documento local" {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'disabled' : '' }}>
                        <i class="bi bi-file-earmark-text fs-5 doc-pdf-icon {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : 'text-primary' }}"></i>
                    </button>
                @endif
            </div>
            <div class="doc-meta {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : '' }}">{{ $documento->area ?: '' }}{{ $documento->tipo ? ' · ' . $documento->tipo : '' }}</div>
        </div>

        <div class="d-flex align-items-center ms-3">
            @if($documento->url && $documento->url != '#')
                <a href="{{ $documento->url }}" target="_blank" class="doc-external-link {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : 'text-secondary' }} ms-2" title="Abrir documento" {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'disabled' : '' }}>
                    <i class="bi bi-link-45deg fs-5"></i>
                </a>
            @endif

            <!-- Edit button: abre modal de edición -->
            <button class="btn btn-sm btn-outline-secondary ms-2 edit-doc"
                type="button"
                data-codigo="{{ $documento->codigo }}"
                data-titulo="{{ $documento->titulo }}"
                data-url="{{ $documento->url }}"
                data-usuarioid="{{ $documento->usuarioID ?? '' }}"
                data-categoriaid="{{ $documento->categoriaID ?? '' }}"
                data-seccionid="{{ $documento->seccionID ?? '' }}"
                data-area="{{ $documento->area ?? '' }}"
                data-tipo="{{ $documento->tipo ?? '' }}"
                title="Editar documento">
                <i class="bi bi-pencil"></i>
            </button>

            <!-- Toggle Active button: desactiva/activa el documento -->
            <button class="btn btn-sm btn-outline-warning ms-2 toggle-activo"
                type="button"
                data-codigo="{{ $documento->codigo }}"
                data-titulo="{{ $documento->titulo }}"
                data-activo="{{ $documento->estado ?? 'activo' }}"
                title="{{ ($documento->estado ?? 'activo') === 'desactivo' ? 'Activar documento' : 'Desactivar documento' }}">
                <i class="bi {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'bi-eye' : 'bi-eye-slash' }}"></i>
            </button>

            <!-- Delete button: elimina el documento -->
            <button class="btn btn-sm btn-outline-danger ms-2 delete-doc"
                type="button"
                data-codigo="{{ $documento->codigo }}"
                data-titulo="{{ $documento->titulo }}"
                title="Eliminar documento">>
                <i class="bi bi-trash"></i>
            </button>
        </div>
    </li>
@endforeach
                
@foreach($seccion->subsecciones as $subseccion)
    <li class="list-group-item bg-light fw-bold text-uppercase d-flex justify-content-between align-items-center subsection-title">
        {{ $subseccion->nombre }}
    <button class="toggle-btn" data-target="sub{{ $subseccion->id }}">
    <span class="label">Ocultar</span>
        <i class="bi bi-chevron-down arrow down"></i>
    </button>
    </li>
    <ul class="list-group list-group-flush subsection-items collapsible" id="sub{{ $subseccion->id }}">
        @foreach($subseccion->documentos as $documento)
            <li class="list-group-item doc-container d-flex justify-content-between align-items-start align-items-center">
                <div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ $documento->url ?: '#' }}" target="_blank"
                        class="fw-semibold text-decoration-none doc-link {{ $documento->url && $documento->url != '#' ? '' : 'text-muted' }} {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : '' }}"
                        data-preview="{{ $documento->urlPreview ?: ($documento->url ?: '') }}"
                        data-edit="{{ $documento->urlEdit ?: ($documento->url ?: '') }}"
                        data-area="{{ $documento->area ?: '' }}"
                        data-type="{{ $documento->tipo ?: '' }}"
                        data-archivo="{{ $documento->archivo ? $documento->archivo : '' }}"
                        data-activo="{{ $documento->estado ?? 'activo' }}">
                        {{ $documento->titulo }}
                    </a>
                    @if($documento->archivo)
                        <button class="btn btn-sm p-0 ms-2 open-pdf" data-archivo="{{ route('documento.archivo', ['codigo' => $documento->codigo]) }}" title="Ver documento local" {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'disabled' : '' }}>
                            <i class="bi bi-file-earmark-text fs-5 doc-pdf-icon {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : 'text-primary' }}"></i>
                        </button>
                    @endif
                        </div>
                    <div class="doc-meta {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : '' }}">{{ $documento->area ?: '' }}{{ $documento->tipo ? ' · ' . $documento->tipo : '' }}</div>
                        </div>
                    <div class="d-flex align-items-center ms-3">
                        @if($documento->url && $documento->url != '#')
                            <a href="{{ $documento->url }}" target="_blank" class="doc-external-link {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'text-muted' : 'text-secondary' }} ms-2" title="Abrir documento" {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'disabled' : '' }}>
                                <i class="bi bi-link-45deg fs-5"></i>
                                        </a>
                                    @endif

                                    <button class="btn btn-sm btn-outline-secondary ms-2 edit-doc"
                                        type="button"
                                        data-codigo="{{ $documento->codigo }}"
                                        data-titulo="{{ $documento->titulo }}"
                                        data-url="{{ $documento->url }}"
                                        data-usuarioid="{{ $documento->usuarioID ?? '' }}"
                                        data-categoriaid="{{ $documento->categoriaID ?? '' }}"
                                        data-seccionid="{{ $documento->seccionID ?? '' }}"
                                        data-area="{{ $documento->area ?? '' }}"
                                        data-tipo="{{ $documento->tipo ?? '' }}"
                                        title="Editar documento">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <!-- Toggle Active button: desactiva/activa el documento -->
                                    <button class="btn btn-sm btn-outline-warning ms-2 toggle-activo"
                                        type="button"
                                        data-codigo="{{ $documento->codigo }}"
                                        data-titulo="{{ $documento->titulo }}"
                                        data-activo="{{ $documento->estado ?? 'activo' }}"
                                        title="{{ ($documento->estado ?? 'activo') === 'desactivo' ? 'Activar documento' : 'Desactivar documento' }}">
                                        <i class="bi {{ ($documento->estado ?? 'activo') === 'desactivo' ? 'bi-eye' : 'bi-eye-slash' }}"></i>
                                    </button>

                                    <!-- Delete button: elimina el documento -->
                                    <button class="btn btn-sm btn-outline-danger ms-2 delete-doc"
                                        type="button"
                                        data-codigo="{{ $documento->codigo }}"
                                        data-titulo="{{ $documento->titulo }}"
                                        title="Eliminar documento">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
        <!---- Footer ---->
        <footer id="footer" class="footer dark-background">

            <div class="container footer-top">

                <div class="row">
                    <div class="col-12 text-center footer-about">
                        <a href="#" class="logo d-flex align-items-center justify-content-center">
                            <span class="sitename">Normateca Institucional</span>
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-md-5 footer-links text-center">
                        <h4>Coordinador de Desarrollo Organizacional</h4>
                        <div class="footer-contact pt-3">
                            <p>Beltrán Ángel Orlando</p>
                            <p class="mt-1"><strong>Ext.</strong> <span>180</span></p>
                            <p class="mt-3"><strong>Email:</strong> <span>coord.do@cesun.edu.mx</span></p>
                        </div>
                    </div>

                    <div class="col-md-5 footer-links text-center">
                        <h4>Jefe de Planeación y Evaluación Institucional</h4>
                        <div class="footer-contact pt-3">
                            <p>Figueroa Mascareño Mario</p>
                            <p class="mt-1"><strong>Ext.</strong> <span>179</span></p>
                            <p class="mt-3"><strong>Email:</strong> <span>planeacionyevaluacion@cesun.edu.mx</span></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container copyright text-center mt-4">
                <div class="credits">
                    Departamento de Planeación y Gestión de Calidad
                </div>
            </div>

        </footer>

        <!---- Preview flotante ---->
        <div id="globalPreview">
            <div class="doc-title"></div>
            <iframe class="doc-frame" frameborder="0"></iframe>
            <div class="doc-info"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    /* ------------------ Abrir modal cuando se haga click en .open-pdf - CORREGIDO ------------------ */
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.open-pdf');
        if(btn){
            // Verificar si el documento está desactivado
            if(btn.disabled) {
                alert('No puedes ver documentos desactivados');
                return;
            }

            const encoded = btn.dataset.archivo || '';
            
            // CORRECCIÓN: Verificar si está codificado antes de decodificar
            let ruta = '';
            try {
                ruta = encoded ? decodeURIComponent(encoded) : '';
            } catch (error) {
                // Si hay error, usar el valor original
                console.log('Error decodificando URI, usando valor original:', error);
                ruta = encoded;
            }
            
            // Verificar que la ruta sea válida (no vacía)
            if(ruta && ruta.trim() !== '') {
                abrirPDFModal(ruta);
            } else if (!ruta) {
                console.warn('No hay ruta de archivo disponible');
            }
        }
    });

    /* ------------------ Preview flotante MEJORADO - Posición fija respecto al viewport ------------------ */
    const globalPreview = document.getElementById("globalPreview");
    let previewTimeout;

    document.addEventListener("mouseover", e => {
        const el = e.target.closest(".doc-container a.fw-semibold");
        if (el) {
            // No mostrar preview si el documento está desactivado
            if(el.dataset.activo === 'desactivo') {
                return;
            }

            clearTimeout(previewTimeout);
            
            let previewURL = el.dataset.preview;
            
            // Si es un Google Docs, convertir a URL de preview
            if (previewURL && previewURL.includes('docs.google.com')) {
                previewURL = previewURL.replace('/edit?', '/preview?');
                previewURL = previewURL.replace('/edit#', '/preview#');
            }
            
            if (previewURL && previewURL !== "#") {
                globalPreview.querySelector(".doc-title").textContent = el.textContent;
                globalPreview.querySelector(".doc-frame").src = previewURL;
                globalPreview.querySelector(".doc-info").textContent =
                    (el.dataset.area || "") + (el.dataset.type ? " · " + el.dataset.type : "");
                
                // Usar posición FIJA respecto al viewport
                const rect = el.getBoundingClientRect();
                const viewportWidth = window.innerWidth;
                const viewportHeight = window.innerHeight;
                
                // Calcular posición FIJA (respecto a la ventana visible)
                let leftPosition = rect.right + 10; // 10px a la derecha del elemento
                let topPosition = rect.top;
                
                // Si no cabe a la derecha, mostrar a la izquierda
                if (leftPosition + 380 > viewportWidth) {
                    leftPosition = rect.left - 390; // 380px + 10px de margen
                }
                
                // Asegurar que no se salga por los bordes horizontales
                leftPosition = Math.max(10, Math.min(leftPosition, viewportWidth - 390));
                
                // Ajustar posición vertical para que no se salga de la pantalla
                if (topPosition + 280 > viewportHeight) {
                    topPosition = viewportHeight - 280;
                }
                
                // Asegurar que no se salga por arriba
                topPosition = Math.max(10, topPosition);
                
                globalPreview.style.position = 'fixed';
                globalPreview.style.top = topPosition + "px";
                globalPreview.style.left = leftPosition + "px";
                globalPreview.style.display = "block";
            }
        }
    });

    document.addEventListener("mouseout", e => {
        const el = e.target.closest(".doc-container a.fw-semibold");
        if (!el) return;
        if (!e.relatedTarget || !el.contains(e.relatedTarget)) {
            previewTimeout = setTimeout(() => {
                if (!globalPreview.matches(":hover")) {
                    globalPreview.style.display = "none";
                }
            }, 150);
        }
    });

    // Mantener el preview visible si el mouse está sobre él
    globalPreview.addEventListener("mouseenter", () => {
        clearTimeout(previewTimeout);
    });

    globalPreview.addEventListener("mouseleave", () => {
        previewTimeout = setTimeout(() => {
            globalPreview.style.display = "none";
        }, 100);
    });

    /* ------------------ Toggle secciones ------------------ */
    document.addEventListener("click", e => {
        if(e.target.closest(".toggle-btn")){
            const btn = e.target.closest(".toggle-btn");
            const targetId = btn.dataset.target;
            const el = document.getElementById(targetId);
            const arrow = btn.querySelector(".arrow");
            const label = btn.querySelector(".label");
            if(el){
                el.classList.toggle("hidden");
                const hidden = el.classList.contains("hidden");
                label.textContent = hidden ? "Mostrar" : "Ocultar";
                arrow.classList.toggle("up", hidden);
                arrow.classList.toggle("down", !hidden);
            }
        }
    });

    /* ------------------ Apertura y limpieza del modal PDF ------------------ */
    function abrirPDFModal(rutaPDF) {
        console.log('Abriendo PDF:', rutaPDF); // Para debug
        
        const viewer = document.getElementById('pdfViewer');
        
        // La ruta viene del route helper, ya está completa
        viewer.src = rutaPDF;

        const modalEl = document.getElementById('pdfModal');
        const bsModal = new bootstrap.Modal(modalEl);
        bsModal.show();

        function onHidden() {
            viewer.src = '';
            modalEl.removeEventListener('hidden.bs.modal', onHidden);
        }
        modalEl.addEventListener('hidden.bs.modal', onHidden);
    }

    /* ------------------ Función para abrir Google Docs correctamente ------------------ */
    document.addEventListener('click', (e) => {
        const link = e.target.closest('.doc-container a.fw-semibold');
        if (link && link.href && link.href.includes('docs.google.com')) {
            // Permitir que el enlace se abra normalmente
            return true;
        }
    });
</script>

        <!-- Modal de vista de PDF -->
        <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel">Vista del Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body p-0">
                        <iframe id="pdfViewer" src="" width="100%" height="600px" style="border:none;"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Botones flotantes -->
    <div class="floating-buttons">
        <button id="btn-add-user" class="float-btn" title="Agregar Usuario" data-bs-toggle="modal" data-bs-target="#modalAddUser">
            <i class="bi bi-person-plus"></i>
        </button>
  <button class="float-btn" title="Agregar Documento o URL"
          data-bs-toggle="modal" data-bs-target="#modalAddDoc">
    <i class="bi bi-file-earmark-plus"></i>
  </button>
  </div>

  <script>
  const scrollTopBtn = document.getElementById('scroll-top');
  const floatingButtons = document.querySelector('.floating-buttons');
  const body = document.body;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      scrollTopBtn.classList.add('active');
      body.classList.add('show-scroll');
    } else {
      scrollTopBtn.classList.remove('active');
      body.classList.remove('show-scroll');
    }
  });

</script>

<!-- Modal para agregar documento -->
  <div class="modal fade" id="modalAddDoc" tabindex="-1" aria-labelledby="modalAddDocLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalAddDocLabel">Agregar Documento o URL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="codigo" class="form-label">Código</label>
              <input type="text" name="codigo" id="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="url" class="form-label">URL</label>
              <input type="url" name="url" id="url" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="categoriaID" class="form-label">Categoría</label>
              <select name="categoriaID" id="categoriaID" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach(DB::table('Categorias')->get() as $cat)
                  <option value="{{ $cat->numero }}">{{ $cat->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="seccionID" class="form-label">Sección</label>
              <select name="seccionID" id="seccionID" class="form-select">
                <option value="">Seleccione una sección</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="subseccionID" class="form-label">Subsección (opcional)</label>
              <select name="subseccionID" id="subseccionID" class="form-select">
                <option value="">Seleccione una subsección</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="archivo" class="form-label">Archivo (opcional)</label>
              <input type="file" name="archivo" id="archivo" class="form-control">
            </div>

            <input type="hidden" name="usuarioID" value="{{ auth()->user()->numero ?? 1 }}">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Documento</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    </div>
<!-- Modal para registrar alumnos/usuarios -->
  
    <!-- Modal para editar documento -->
    <div class="modal fade" id="modalEditDoc" tabindex="-1" aria-labelledby="modalEditDocLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="modalEditDocLabel">Editar Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="formEditDoc" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" id="edit_method">
                    <input type="hidden" name="codigo" id="edit_codigo">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" id="edit_titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_url" class="form-label">URL</label>
                            <input type="url" name="url" id="edit_url" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_archivo" class="form-label">Archivo (actualizar opcional)</label>
                            <input type="file" name="archivo" id="edit_archivo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Si dejas el archivo vacío, el archivo almacenado no cambiará.</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal para registrar alumnos/usuarios -->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="modalAddUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAddUserLabel">Registrar Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required minlength="8">
                    </div>

                    <div class="mb-3">
                        <label for="contrasena_confirmation" class="form-label">Confirmar contraseña</label>
                        <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control" required minlength="8">
                    </div>

                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-select" required>
                            <option value="usuario" {{ old('rol') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                            <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Cuando cambia la categoría
    $('#categoriaID').change(function(){
        var categoriaID = $(this).val();
        $('#seccionID').empty().append('<option value="">Cargando...</option>');
        $('#subseccionID').empty().append('<option value="">Seleccione una subsección</option>');
        if(categoriaID){
            $.getJSON('/documentos/secciones/' + categoriaID, function(data){
                $('#seccionID').empty().append('<option value="">Seleccione una sección</option>');
                $.each(data, function(i, item){
                    $('#seccionID').append('<option value="'+item.numero+'">'+item.nombre+'</option>');
                });
            });
        }
    });

    // Cuando cambia la sección
    $('#seccionID').change(function(){
        var seccionPadreID = $(this).val();
        $('#subseccionID').empty().append('<option value="">Cargando...</option>');
        if(seccionPadreID){
            $.getJSON('/documentos/subsecciones/' + seccionPadreID, function(data){
                $('#subseccionID').empty().append('<option value="">Seleccione una subsección</option>');
                $.each(data, function(i, item){
                    $('#subseccionID').append('<option value="'+item.numero+'">'+item.nombre+'</option>');
                });
            });
        } else {
            $('#subseccionID').empty().append('<option value="">Seleccione una subsección</option>');
        }
    });
});
</script>
<!-- Confirm modal (reutilizable) -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">¿Confirmar acción?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="confirmModalConfirmBtn" class="btn">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
// Manejo del botón de edición - rellena el modal y ajusta la acción del formulario
document.addEventListener('click', function(e){
    const btn = e.target.closest('.edit-doc');
    if(!btn) return;

    const codigo = btn.dataset.codigo || '';
    const titulo = btn.dataset.titulo || '';
    const url = btn.dataset.url || '';

    // Rellenar campos del modal
    document.getElementById('edit_codigo').value = codigo;
    document.getElementById('edit_titulo').value = titulo;
    document.getElementById('edit_url').value = url;

    // Ajustar acción del formulario para enviar PUT a /documentos/{codigo}
    const form = document.getElementById('formEditDoc');
    if(form){
        // Si la aplicación usa una ruta nombrada diferente, ajustar aquí.
        form.action = '/documentos/' + encodeURIComponent(codigo);
    }

    // Abrir modal
    const modalEl = document.getElementById('modalEditDoc');
    const bsModal = new bootstrap.Modal(modalEl);
    bsModal.show();
});

// Limpieza rápida al cerrar: vaciar campo file
document.getElementById('modalEditDoc')?.addEventListener('hidden.bs.modal', function(){
    const fileInput = document.getElementById('edit_archivo');
    if(fileInput) fileInput.value = null;
});

/* ------------------ Confirmación con modal reutilizable ------------------ */
// Preparar modal (ver HTML al final del documento)
const confirmModalEl = document.getElementById('confirmModal');
const confirmModal = confirmModalEl ? new bootstrap.Modal(confirmModalEl) : null;
const confirmTitle = confirmModalEl?.querySelector('.modal-title');
const confirmBody = confirmModalEl?.querySelector('.modal-body');
const confirmBtn = confirmModalEl?.querySelector('#confirmModalConfirmBtn');

function openConfirmModal(options){
    // options: { type: 'toggle'|'delete', codigo, titulo, activo }
    if(!confirmModalEl) return;
    const { type, codigo, titulo, activo } = options;

    if(type === 'toggle'){
        const will = activo ? 'DESACTIVAR' : 'ACTIVAR';
        confirmTitle.textContent = will + ' documento';
        confirmBody.textContent = `¿Está seguro de que desea ${will.toLowerCase()} el documento "${titulo}"?`;
        confirmBtn.classList.remove('btn-danger');
        confirmBtn.classList.add('btn-warning');
        confirmBtn.textContent = activo ? 'Desactivar' : 'Activar';
    } else if(type === 'delete'){
        confirmTitle.textContent = 'Eliminar documento';
        confirmBody.textContent = `¿Está seguro de que desea ELIMINAR PERMANENTEMENTE el documento "${titulo}"? Esta acción no se puede deshacer.`;
        confirmBtn.classList.remove('btn-warning');
        confirmBtn.classList.add('btn-danger');
        confirmBtn.textContent = 'Eliminar';
    }

    // Guardar datos en el botón de confirmar
    confirmBtn.dataset.type = type;
    confirmBtn.dataset.codigo = codigo;
    confirmBtn.dataset.activo = activo ? '1' : '0';

    confirmModal.show();
}

// Manejo de clicks en botones que requieren confirmación
document.addEventListener('click', function(e){
    const toggleBtn = e.target.closest('.toggle-activo');
    if(toggleBtn){
        const codigo = toggleBtn.dataset.codigo || '';
        const titulo = toggleBtn.dataset.titulo || '';
        const activo = toggleBtn.dataset.activo === 'true' || toggleBtn.dataset.activo === '1';
        openConfirmModal({ type: 'toggle', codigo, titulo, activo });
        return;
    }

    const delBtn = e.target.closest('.delete-doc');
    if(delBtn){
        const codigo = delBtn.dataset.codigo || '';
        const titulo = delBtn.dataset.titulo || '';
        openConfirmModal({ type: 'delete', codigo, titulo });
        return;
    }
});

// Acción al confirmar en el modal
confirmBtn?.addEventListener('click', function(){
    const type = this.dataset.type;
    const codigo = this.dataset.codigo;

    if(!codigo) {
        confirmModal.hide();
        return;
    }

    if(type === 'toggle'){
        // AJAX toggle: enviar POST y actualizar DOM sin recargar
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        fetch('/documentos/' + encodeURIComponent(codigo) + '/toggle-activo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({})
        }).then(res => res.json())
        .then(data => {
            if(!data || !data.success) {
                console.error('Error response:', data);
                alert('Error al cambiar estado: ' + (data?.mensaje || 'Error desconocido'));
                return;
            }
            const activo = data.activo; // 'activo' o 'desactivo'
            const isActive = activo === 'activo';

            // Encontrar el <li> correspondiente
            const li = document.querySelector('li.list-group-item[data-codigo="' + codigo + '"]');
            if(li){
                // Actualizar link principal
                const docLink = li.querySelector('a.fw-semibold.doc-link');
                if(docLink){
                    docLink.dataset.activo = activo;
                    if(isActive){
                        docLink.classList.remove('text-muted');
                    } else {
                        docLink.classList.add('text-muted');
                    }
                }

                // Actualizar icono PDF
                const openPdfBtn = li.querySelector('.open-pdf');
                const openPdfIcon = li.querySelector('.open-pdf i.doc-pdf-icon');
                if(openPdfBtn){
                    openPdfBtn.disabled = !isActive;
                }
                if(openPdfIcon){
                    if(isActive){
                        openPdfIcon.classList.remove('text-muted');
                        openPdfIcon.classList.add('text-primary');
                    } else {
                        openPdfIcon.classList.remove('text-primary');
                        openPdfIcon.classList.add('text-muted');
                    }
                }

                // Actualizar meta
                const meta = li.querySelector('.doc-meta');
                if(meta){
                    if(isActive){
                        meta.classList.remove('text-muted');
                    } else {
                        meta.classList.add('text-muted');
                    }
                }

                // Actualizar link externo
                const externalLink = li.querySelector('a.doc-external-link');
                if(externalLink){
                    externalLink.disabled = !isActive;
                    if(isActive){
                        externalLink.classList.remove('text-muted');
                        externalLink.classList.add('text-secondary');
                    } else {
                        externalLink.classList.remove('text-secondary');
                        externalLink.classList.add('text-muted');
                    }
                }

                // Actualizar botón toggle
                const toggleBtn = li.querySelector('.toggle-activo');
                if(toggleBtn){
                    toggleBtn.dataset.activo = activo;
                    const icon = toggleBtn.querySelector('i');
                    if(icon){
                        icon.classList.toggle('bi-eye', !isActive);
                        icon.classList.toggle('bi-eye-slash', isActive);
                    }
                    toggleBtn.title = isActive ? 'Desactivar documento' : 'Activar documento';
                }
            }
        }).catch(err => {
            console.error('Fetch error:', err);
            alert('Error al cambiar estado: ' + err.message);
        });

    } else if(type === 'delete'){
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/documentos/' + encodeURIComponent(codigo);

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        form.appendChild(csrfInput);

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }

    confirmModal.hide();
});

</script>
</body>
</html>