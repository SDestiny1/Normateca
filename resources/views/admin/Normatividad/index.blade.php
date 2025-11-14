<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Normateca Institucional</title>
  <meta name="description" content="Paltaforma para la consulta y difusión de las disposiciones administrativas internas de CESUN Universidad">
  <meta name="keywords" content="normateca, normatividad, disposiciones administrativas, CESUN Universidad, gestión de calidad, simplificación normativa">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="../../assets/css/main.css" rel="stylesheet">
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
      display: none; position: absolute; width: 360px; background: #fff; border: 1px solid #ddd;
      border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); padding: 12px; z-index: 9999;
    }
    #globalPreview .doc-title { font-size: 14px; font-weight: 600; color: #1a73e8; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
    #globalPreview .doc-title::before { content: "📄"; font-size: 16px; }
    #globalPreview .doc-frame { width: 100%; height: 200px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 10px; }
    #globalPreview .doc-info { font-size: 12px; color: #555; line-height: 1.4; }
    .doc-container { cursor: pointer; }
    .doc-meta { font-size: 14px; color: #666; margin-top: 4px; }

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
        <h1 class="sitename">Normateca Institucional</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('usuario.landing') }}" class="">Inicio</a></li>
        <li class="nav-item dropdown">
          <a href="{{ route('estructura.index') }}" class="nav-link">Estructura Organizacional</a>
        </li>
          <li class="nav-item dropdown">
            <a href="{{ route('normatividad.index') }}" class="nav-link active">Normatividad</a>
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
  <img src="../../assets/img/Mesa de trabajo 1-80.jpg" alt="" class="img-fluid w-100">
</section>

<!---- Links rápidos ---->
<div class="container my-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <a class="card h-100 text-decoration-none shadow-sm" href="#procesos">
        <div class="card-body d-flex align-items-center gap-3">
          <i class="bi bi-diagram-3 fs-2 text-primary"></i>
          <div>
            <h5 class="mb-1">Procesos</h5>
            <div class="text-secondary small">Estructura por áreas clave</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a class="card h-100 text-decoration-none shadow-sm" href="#rectoria">
        <div class="card-body d-flex align-items-center gap-3">
          <i class="bi bi-journal-text fs-2 text-primary"></i>
          <div>
            <h5 class="mb-1">Rectoría</h5>
            <div class="text-secondary small">Funciones y responsabilidades</div>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a class="card h-100 text-decoration-none shadow-sm" href="#direccion">
        <div class="card-body d-flex align-items-center gap-3">
          <i class="bi bi-diagram-3 fs-2 text-primary"></i>
          <div>
            <h5 class="mb-1">Dirección Académica</h5>
            <div class="text-secondary small">Estructura por áreas clave</div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<!---- Secciones ---->
<div class="container-fluid px-5 my-5">
  <div id="procesos" class="section-anchor mb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-2">Procesos</h3>
      <button class="toggle-btn" data-target="listProcesos">
        <span class="label">Ocultar</span>
        <i class="bi bi-chevron-down arrow down"></i>
      </button>
    </div>
    <ul class="list-group list-group-flush list-hover collapsible" id="listProcesos"></ul>
  </div>

  <div id="rectoria" class="section-anchor mb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-2">Rectoría</h3>
      <button class="toggle-btn" data-target="listRectoria">
        <span class="label">Ocultar</span>
        <i class="bi bi-chevron-down arrow down"></i>
      </button>
    </div>
    <ul class="list-group list-group-flush list-hover collapsible" id="listRectoria"></ul>
  </div>

  <div id="direccion" class="section-anchor mb-5">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="mb-2">Dirección Académica</h3>
      <button class="toggle-btn" data-target="listDireccion">
        <span class="label">Ocultar</span>
        <i class="bi bi-chevron-down arrow down"></i>
      </button>
    </div>
    <ul class="list-group list-group-flush list-hover collapsible" id="listDireccion"></ul>
  </div>


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
  const DATA = {
    Procesos: [
      { title:'Manual de Procedimientos', area:'Procesos', type:'Procedimiento', urlPreview:'https://drive.google.com/file/d/1j9h6sSY-kN9Fq5IeaFgEJ0rYpQRUTdPi/preview', urlEdit:'https://drive.google.com/file/d/1j9h6sSY-kN9Fq5IeaFgEJ0rYpQRUTdPi/edit', archivo:'/storage/pdfs/MANUAL_DE_PROCEDIMIENTOS_CESUN_2021.pdf' },
      { title:'Metodología para elaborar Manual de Procedimientos', area:'Procesos', type:'Procedimiento', urlPreview:'', urlEdit:'' }
    ],
    Rectoria: [
      { title:'Elaboración del Informe Anual de labores', area:'Rectoria', type:'Informe', urlPreview:'#', urlEdit:'#' }
    ],
    Direccion: [
      { title:'Definición de grupos para cobertura de oferta educativa (DAC-P001-septiembre 2021)', area:'Direccion', type:'Direccion', urlPreview:'#', urlEdit:'#' },
      {
        subsection:"SUBDIRECCIÓN ACADÉMICA",
        items:[
          { title:'Gestión de curso (DAC-SA-P006-octubre 2021)', area:'Direccion', type:'Subdireccion Academica', urlPreview:'#', urlEdit:'#' },
          { title:'Inducción de estudiante nuevo ingreso (DAC-SA-P002-abril 2022)', area:'Direccion', type:'Subdireccion Academica', urlPreview:'#', urlEdit:'#' }
        ]
      }
    ]
  };

/* ------------------ Helper para render de un item ------------------ */
function renderItemMarkup(it) {
  const archivoAttr = it.archivo ? encodeURI(it.archivo) : '';
  const tienePreview = it.urlPreview && it.urlPreview !== '#';

  const linkDestino = tienePreview ? it.urlPreview : '#';

  const previewIcon = archivoAttr
    ? `<button class="btn btn-sm p-0 ms-2 open-pdf" data-archivo="${archivoAttr}" title="Ver documento local">
         <i class="bi bi-file-earmark-text fs-5 text-primary"></i>
       </button>`
    : '';

  const editLink = it.urlEdit && it.urlEdit !== '#'
    ? `<a href="${it.urlEdit}" target="_blank" class="text-secondary ms-2" title="Abrir en Drive">
         <i class="bi bi-link-45deg fs-5"></i>
       </a>`
    : '';

  return `
    <li class="list-group-item doc-container d-flex justify-content-between align-items-start">
      <div>
        <div class="d-flex align-items-center gap-2">
          <a href="${linkDestino}" target="_blank"
             class="fw-semibold text-decoration-none ${tienePreview ? '' : 'text-muted'}"
             data-preview="${it.urlPreview || ''}"
             data-edit="${it.urlEdit || ''}"
             data-area="${it.area || ''}"
             data-type="${it.type || ''}"
             data-archivo="${archivoAttr}">
            ${it.title}
          </a>
          ${previewIcon}
        </div>
        <div class="doc-meta">${it.area || ''}${it.type ? ' · ' + it.type : ''}</div>
      </div>
      ${editLink}
    </li>
  `;
}


/* ------------------ Render de listas ------------------ */
function renderList(id, items){
  const ul = document.getElementById(id);
  ul.innerHTML = items.map((i, idx)=>{
    if(i.subsection){
      const subsectionId = `${id}_sub_${idx}`;
      return `
        <li class="list-group-item bg-light fw-bold text-uppercase d-flex justify-content-between align-items-center subsection-title">
          ${i.subsection}
          <button class="toggle-btn" data-target="${subsectionId}">
            <span class="label">Ocultar</span>
            <i class="bi bi-chevron-down arrow down"></i>
          </button>
        </li>
        <ul class="list-group list-group-flush subsection-items collapsible" id="${subsectionId}">
          ${i.items.map(it => renderItemMarkup(it)).join('')}
        </ul>
      `;
    } else {
      return renderItemMarkup(i);
    }
  }).join('');
}

renderList('listProcesos', DATA.Procesos);
renderList('listRectoria', DATA.Rectoria);
renderList('listDireccion', DATA.Direccion);

/* ------------------ Toggle secciones ------------------ */
document.addEventListener("click", e=>{
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

/* ------------------ Abrir modal cuando se haga click en .open-pdf ------------------ */
document.addEventListener('click', (e)=>{
  const btn = e.target.closest('.open-pdf');
  if(btn){
    const encoded = btn.dataset.archivo || '';
    const ruta = encoded ? decodeURI(encoded) : '';
    if(ruta) abrirPDFModal(ruta);
  }
});

/* ------------------ Preview flotante ------------------ */
const globalPreview = document.getElementById("globalPreview");
document.addEventListener("mouseover", e => {
  const el = e.target.closest(".doc-container a.fw-semibold");
  if (el) {
    const previewURL = el.dataset.preview;
    if (previewURL && previewURL !== "#") {
      globalPreview.querySelector(".doc-title").textContent = el.textContent;
      globalPreview.querySelector(".doc-frame").src = previewURL;
      globalPreview.querySelector(".doc-info").textContent =
        (el.dataset.area || "") + (el.dataset.type ? " · " + el.dataset.type : "");
      const rect = el.getBoundingClientRect();
      globalPreview.style.top = rect.bottom + window.scrollY + 5 + "px";
      globalPreview.style.left = rect.left + window.scrollX + "px";
      globalPreview.style.display = "block";
    } else {
      globalPreview.style.display = "none";
    }
  }
});

document.addEventListener("mouseout", e=>{
  const el = e.target.closest(".doc-container a.fw-semibold");
  if(el){
    setTimeout(()=>{ if(!globalPreview.matches(":hover")) globalPreview.style.display="none"; },50);
  }
});
globalPreview.addEventListener("mouseleave", ()=>{ globalPreview.style.display="none"; });

/* ------------------ Apertura y limpieza del modal PDF ------------------ */
function abrirPDFModal(rutaPDF) {
  const viewer = document.getElementById('pdfViewer');
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

    <!-- Botones flotantes -->
  <div class="floating-buttons">
    <button id="btn-add-user" class="float-btn" title="Agregar Usuario">
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

@section('scripts')
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
</body>
</html>