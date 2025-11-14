<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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

    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Normateca Institucional</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('usuario.landing') }}" class="">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('estructura.index') }}" class="nav-link active">Estructura Organizacional</a>
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
                        <a href="{{ route('formatos.index') }}" class="nav-link">Formatos</a>
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
    <li class="list-group-item doc-container d-flex justify-content-between align-items-start">
        <div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ $documento->url ?: '#' }}" target="_blank"
                    class="fw-semibold text-decoration-none {{ $documento->url && $documento->url != '#' ? '' : 'text-muted' }}"
                    data-preview="{{ $documento->urlPreview ?: ($documento->url ?: '') }}"
                    data-edit="{{ $documento->urlEdit ?: ($documento->url ?: '') }}"
                    data-area="{{ $documento->area ?: '' }}"
                    data-type="{{ $documento->tipo ?: '' }}"
                    data-archivo="{{ $documento->archivo ? $documento->archivo : '' }}"> <!-- CORREGIDO: Sin urlencode -->
                    {{ $documento->titulo }}
                </a>
                @if($documento->archivo)
                    <!-- CORREGIDO: Pasar la ruta directamente sin codificar -->
                    <button class="btn btn-sm p-0 ms-2 open-pdf" data-archivo="{{ $documento->archivo }}" title="Ver documento local">
                        <i class="bi bi-file-earmark-text fs-5 text-primary"></i>
                    </button>
                @endif
            </div>
            <div class="doc-meta">{{ $documento->area ?: '' }}{{ $documento->tipo ? ' · ' . $documento->tipo : '' }}</div>
        </div>
        @if($documento->url && $documento->url != '#')
            <a href="{{ $documento->url }}" target="_blank" class="text-secondary ms-2" title="Abrir documento">
                <i class="bi bi-link-45deg fs-5"></i>
            </a>
        @endif
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
                            <li class="list-group-item doc-container d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ $documento->url ?: '#' }}" target="_blank"
                                            class="fw-semibold text-decoration-none {{ $documento->url && $documento->url != '#' ? '' : 'text-muted' }}"
                                            data-preview="{{ $documento->urlPreview ?: ($documento->url ?: '') }}"
                                            data-edit="{{ $documento->urlEdit ?: ($documento->url ?: '') }}"
                                            data-area="{{ $documento->area ?: '' }}"
                                            data-type="{{ $documento->tipo ?: '' }}"
                                            data-archivo="{{ $documento->archivo ? urlencode($documento->archivo) : '' }}">
                                            {{ $documento->titulo }}
                                        </a>
                                        @if($documento->archivo)
                                            <button class="btn btn-sm p-0 ms-2 open-pdf" data-archivo="{{ urlencode($documento->archivo) }}" title="Ver documento local">
                                                <i class="bi bi-file-earmark-text fs-5 text-primary"></i>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="doc-meta">{{ $documento->area ?: '' }}{{ $documento->tipo ? ' · ' . $documento->tipo : '' }}</div>
                                </div>
                                @if($documento->url && $documento->url != '#')
                                    <a href="{{ $documento->url }}" target="_blank" class="text-secondary ms-2" title="Abrir documento">
                                        <i class="bi bi-link-45deg fs-5"></i>
                                    </a>
                                @endif
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
            
            // Verificar que la ruta sea válida
            if(ruta && ruta.startsWith('/')) {
                abrirPDFModal(ruta);
            } else if (ruta) {
                console.warn('Ruta de archivo no válida:', ruta);
            }
        }
    });

    /* ------------------ Preview flotante MEJORADO - Posición fija respecto al viewport ------------------ */
    const globalPreview = document.getElementById("globalPreview");
    let previewTimeout;

    document.addEventListener("mouseover", e => {
        const el = e.target.closest(".doc-container a.fw-semibold");
        if (el) {
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
        if (el && !e.relatedTarget || !el.contains(e.relatedTarget)) {
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
        
        // CORRECCIÓN: Asegurar que la ruta sea absoluta
        let rutaFinal = rutaPDF;
        if (rutaPDF && !rutaPDF.startsWith('http') && !rutaPDF.startsWith('/')) {
            rutaFinal = '/' + rutaPDF;
        }
        
        viewer.src = rutaFinal;

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

    </body>
</html>