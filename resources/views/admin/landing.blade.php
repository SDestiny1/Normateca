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
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Normateca Institucional Admin</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href={{ route('admin.landing') }} class="active">Inicio</a></li>
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
            <a href="{{ route('formatos.index') }}" class="nav-link">Formatos</a>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="../assets/img/Mesa de trabajo 1-80.jpg" alt="">

    </section>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Introduccion</h3>
            <img src="../assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="Gestión Estudiantil">
            <p>En este sentido, en la Dirección Administrativa se creó el Departamento de Planeación y Gestión de Calidad, el cual tiene un mecanismo denominado Normateca Interna, cuyo objetivo es la difusión de la normatividad y disposiciones administrativas internas que se aprueben por el Rector.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p>
                Desde 2019, se planteó en el Plan de Desarrollo Institucional 2020-2027, como una de las estrategias previstas el eje de Gestión Institucional con el objetivo de Implementar un Sistema de Gestión de la Calidad basado en estándares nacionales e internacionales para la acreditación y certificación institucional lo cual permitirá el desarrollar mecanismos para evitar la sobreregulación y asegurar la simplificación del marco normativo interno y de atención al estudiante; por lo que se hizo necesario contar con una herramienta de coordinación interna en cada unidad administrativa de CESUN Universidad, que contribuya a la simplificación de disposiciones administrativas que regulan la operación y funcionamiento interno de éstas.              </p>
              <div class="position-relative mt-4">
                <img src="../assets/img/about-2.jpg" class="img-fluid rounded-4" alt="Plataforma Educativa">
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <!-- What is Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <p>
            Que es la Normateca Interna?
          </p>
          <p>
            La Normateca Interna es una herramienta para la difusión y consulta de las disposiciones administrativas internas que emite CESUN Universidad, aprobadas por el Rector.
          </p>
          <p>
            Se entiende como disposiciones administrativas internas: las políticas, lineamientos, acuerdos, normas, circulares, formatos, criterios, metodologías, instructivos, directivas, reglas y otras que normen su actividad interna, emitidas por el Rector o los titulares de las Unidades Administrativas en el ámbito de sus atribuciones.
          </p>
          <p>
            La Normateca Interna es un portal abierto a cualquier integrante de la comunidad CESUN que quiera conocer sobre el marco normativo de CESUN Universidad.
          </p>
        </div>

      </div>

    </section>

    <!-- Mision - Vision Section -->
    <section id="team" class="team section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Sobre CESUN Universidad</h2>
        <p>Mision y Vision</p>
      </div>

      <div class="container">

        <div class="row gy-5">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-info">
                <h4>Mision</h4>
                <span>Somos una institución educativa que forma profesionales integrales, a través de un currículo vanguardista contribuyendo al desarrollo del entorno y la sociedad, con integridad y responsabilidad social.</span>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-info">
                <h4>Vision</h4>
                <span>Ser una institución educativa considerada entre las mejores del Estado, con cobertura, presencia y reconocimiento nacional e internacional, a través de un currículo aplicado con un modelo vanguardista de aprendizaje en línea, generando comunidades de expertos multidisciplinarios, que propicien el crecimiento social en un contexto global.</span>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

    <!-- Valores y principios Section -->
    <section id="about" class="about section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Sobre CESUN Universidad</h2>
        <p>Valores y Principios</p>
      </div>
      
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Integridad</h3>
            <p>Transparencia en el comportamiento, que permite emplear de forma correcta las aptitudes y capacidades para contribuir al desarrollo del entorno y la sociedad.</p>
            <h3>Responsabilidad</h3>
            <p>Cumplimiento de los derechos y obligaciones de forma congruente actuando de forma correcta, con la sociedad y su entorno</p>
            <h3>Compromiso</h3>
            <p>Cumplir con las obligaciones contraídas, con el propósito de lograr el desarrollo personal y profesional, de manera integral, para beneficio de su entorno y la sociedad.</p>
            <h3>Solidaridad</h3>
            <p>Trabajo colaborativo con equidad y transparencia en el comportamiento , aportando sus ideas y conocimientos con el propósito de lograr el desarrollo integral, para beneficio de su entorno y la sociedad..</p>
          </div>
         <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Equidad</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Honestidad</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Responsabilidad tecnologica</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Gestión de la información</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Calidad académica</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Creatividad</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Innovación</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Responsabilidad social</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Desarrollo Humano</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Trabajo colaborativo</span></li>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </section>

        <!-- Objectives Section -->
    <section id="tools" class="services-2 section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Mas sobre la Normateca</h2>
        <p>OBJETIVOS DE LA NORMATECA INTERNA</p>
      </div>
      <div class="container">

        <div class="row gy-4">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-newspaper icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Facil accesibilidad</h4>
                <p class="description">Presentar en un medio informático de fácil accesibilidad las disposiciones administrativas internas de CESUN Universidad, debidamente organizadas.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-award icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Dispocisiones administrativas</h4>
                <p class="description">Favorecer el registro, difusión y actualización de las disposiciones administrativas internas.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-diagram-3 icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Dispocisiones vigentes</h4>
                <p class="description">Dar a conocer al personal de CESUN Universidad las disposiciones administrativas internas vigentes, para que opinen y participen en su simplificación y, en su caso, en la desregulación, cuando proceda.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-clock-history icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Normas internas</h4>
                <p class="description">Promover el conocimiento y cumplimiento de las normas internas.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-graph-up icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Controles de registros</h4>
                <p class="description">Propiciar la operación, administración y control de un registro electrónico de las disposiciones vigentes.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-shield-check icon flex-shrink-0"></i>
              <div>
                <h4 class="title">Productividad</h4>
                <p class="description">Impulsar la transparencia, el acceso a la información, combatir la corrupción e incrementar la productividad del personal de CESUN Universidad mediante la consulta de disposiciones administrativas internas, por medios electrónicos.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

  </main>

<footer id="footer" class="footer dark-background">

  <div class="container footer-top">

    <div class="row">
      <div class="col-12 text-center footer-about">
        <a href="#" class="logo d-flex align-items-center justify-content-center">
          <span class="sitename">Normateca Institucional</span>
        </a>
      </div>
    </div>

    <!-- Coordinador y Jefe en una sola línea -->
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
  <button id="btn-add-doc" class="float-btn" title="Agregar Documento o URL">
    <i class="bi bi-file-earmark-plus"></i>
  </button>
</div>

<style>
  .floating-buttons {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 10px;
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

<!-- Modal para agregar documento (estilo formulario dependiente) -->
<div class="modal fade" id="modalAddDoc" tabindex="-1" aria-labelledby="modalAddDocLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-1 shadow">
      <div class="modal-header bg-primary text-white">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <form id="formAddDoc" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" style="font-family: Arial, sans-serif;">
          @csrf

          <style>
            /* Copiado/adaptado del estilo del formulario original solicitado */
            #formAddDoc label { display:block; margin-top:12px; font-weight:bold; }
            #formAddDoc input[type="text"], #formAddDoc input[type="url"], #formAddDoc select, #formAddDoc textarea {
              width:100%;
              padding:8px;
              margin-top:6px;
              border-radius:6px;
              border:1px solid #ccc;
              box-sizing: border-box;
            }
            #formAddDoc .input-group { display:flex; gap:8px; align-items:center; margin-top:6px; }
            #formAddDoc .input-group input[type="text"] { flex:1; }
            #formAddDoc .attach-btn {
              padding:8px 12px; background:#28a745; color:#fff; border:none; border-radius:6px; cursor:pointer; font-weight:bold;
            }
            #formAddDoc .attach-btn:hover { background:#1e7e34; }
            #formAddDoc .file-preview { margin-top:12px; text-align:center; display:none; }
            #formAddDoc .file-preview img { width:80px; height:80px; object-fit:contain; }
            #formAddDoc .file-name { margin-top:6px; font-size:14px; font-weight:bold; color:#555; }
            .small-btn { padding:6px 8px; border-radius:6px; border:1px solid #0d6efd; background:#fff; color:#0d6efd; cursor:pointer; }
            .small-btn:hover { background:#e7f0ff; }
            .modal-body { padding:18px; }
          </style>

          <!-- Título -->
          <label for="titulo">Título:</label>
          <input type="text" name="titulo" id="titulo" required>

          <!-- Categoría -->
          <label for="categoria">Categoría:</label>
          <select id="categoria" name="categoriaID" required>
            <option value="">-- Selecciona una categoría --</option>
            @foreach($categorias as $cat)
              <option value="{{ $cat->numero }}">{{ $cat->nombre }}</option>
            @endforeach
          </select>

          <!-- Sección + botón agregar -->
          <label for="seccion">Sección:</label>
          <div style="display:flex; gap:8px; align-items:center;">
            <select id="seccion" name="seccionID" style="flex:1;">
              <option value="">Selecciona una categoría para ver las secciones</option>
            </select>
            <button type="button" id="btn-add-seccion" class="small-btn" title="Agregar nueva sección">
              <i class="bi bi-plus-circle me-1"></i>Sección
            </button>
          </div>
          <!-- input oculto para nueva seccion (se usa solo si se elige 'agregar' o con el botón) -->
          <input type="text" id="nuevaSeccionInput" name="nuevaSeccion" placeholder="Escribe nueva sección" style="display:none; margin-top:8px;">

          <!-- Subsección + boton agregar subseccion -->
          <label for="subseccion">Sub-sección:</label>
          <div style="display:flex; gap:8px; align-items:center;">
            <select id="subseccion" name="subseccionID" style="flex:1;">
              <option value="">Selecciona una sección para ver las sub-secciones</option>
            </select>
            <button type="button" id="btn-add-subseccion" class="small-btn" title="Agregar nueva sub-sección">
              <i class="bi bi-plus-circle me-1"></i>Sub
            </button>
          </div>
          <input type="text" id="nuevaSubseccionInput" name="nuevaSubseccion" placeholder="Escribe nueva sub-sección" style="display:none; margin-top:8px;">

          <!-- URL -->
          <label for="url">Enlace:</label>
          <input type="url" id="url" name="url" placeholder="https://...">

          <!-- Archivo -->
          <label for="archivo">Archivo:</label>
          <div class="input-group" style="margin-top:6px;">
            <input type="text" id="urlPreview" name="urlPreview" placeholder="URL o archivo adjunto">
            <button type="button" id="btnAdjuntarModal" class="attach-btn">Adjuntar</button>
          </div>
          <input type="file" id="archivoAdjuntoModal" name="archivo" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" style="display:none;">
          <div id="filePreviewModal" class="file-preview">
            <img id="fileIconModal" src="" alt="Archivo">
            <div id="fileNameModal" class="file-name"></div>
          </div>

          <!-- Botones -->
          <div style="display:flex; gap:8px; margin-top:16px;">
            <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary w-50">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const btnAddDoc = document.getElementById('btn-add-doc');
  const modalEl = document.getElementById('modalAddDoc');
  const modalAddDoc = new bootstrap.Modal(modalEl);

  btnAddDoc?.addEventListener('click', () => modalAddDoc.show());

  const selectCategoria = document.getElementById('categoria');
  const selectSeccion = document.getElementById('seccion');
  const selectSubseccion = document.getElementById('subseccion');
  const nuevaSeccionInput = document.getElementById('nuevaSeccionInput');
  const nuevaSubseccionInput = document.getElementById('nuevaSubseccionInput');

  const btnAdjuntarModal = document.getElementById('btnAdjuntarModal');
  const archivoAdjuntoModal = document.getElementById('archivoAdjuntoModal');
  const filePreviewModal = document.getElementById('filePreviewModal');
  const fileIconModal = document.getElementById('fileIconModal');
  const fileNameModal = document.getElementById('fileNameModal');
  const urlPreview = document.getElementById('urlPreview');

  const todasLasSecciones = @json($secciones);

  function cargarSeccionesParaCategoria(categoriaNumero) {
    selectSeccion.innerHTML = '<option value="">-- Selecciona una sección --</option>';
    selectSubseccion.innerHTML = '<option value="">Selecciona una sección para ver las sub-secciones</option>';
    nuevaSeccionInput.style.display = 'none';
    nuevaSubseccionInput.style.display = 'none';
    nuevaSeccionInput.value = '';
    nuevaSubseccionInput.value = '';

    if (!categoriaNumero) {
      selectSeccion.innerHTML = '<option value="">Selecciona una categoría para ver las secciones</option>';
      return;
    }

    const filtradas = todasLasSecciones.filter(s => String(s.categoriaID) === String(categoriaNumero) && (s.seccionPadreID === null || s.seccionPadreID === undefined));
    filtradas.forEach(s => {
      const opt = document.createElement('option');
      opt.value = s.numero;
      opt.textContent = s.nombre;
      selectSeccion.appendChild(opt);
    });

    const agregarOpt = document.createElement('option');
    agregarOpt.value = 'agregar';
    agregarOpt.textContent = '-- Agregar otra sección --';
    selectSeccion.appendChild(agregarOpt);
  }

  function cargarSubseccionesParaSeccion(seccionNumero) {
    selectSubseccion.innerHTML = '<option value="">-- Selecciona una sub-sección --</option>';
    nuevaSubseccionInput.style.display = 'none';
    nuevaSubseccionInput.value = '';

    if (!seccionNumero) {
      selectSubseccion.innerHTML = '<option value="">Selecciona una sección para ver las sub-secciones</option>';
      return;
    }
    if (seccionNumero === 'agregar') {
      nuevaSeccionInput.style.display = 'block';
      selectSubseccion.innerHTML = '<option value="">Selecciona una sección para ver las sub-secciones</option>';
      return;
    }

    const subs = todasLasSecciones.filter(s => String(s.seccionPadreID) === String(seccionNumero));
    if (subs.length === 0) {
      selectSubseccion.innerHTML = '<option value="">No hay sub-secciones disponibles</option>';
    } else {
      subs.forEach(sub => {
        const opt = document.createElement('option');
        opt.value = sub.numero;
        opt.textContent = sub.nombre;
        selectSubseccion.appendChild(opt);
      });
    }

    const agregarSub = document.createElement('option');
    agregarSub.value = 'agregar';
    agregarSub.textContent = '-- Agregar otra sub-sección --';
    selectSubseccion.appendChild(agregarSub);
  }

  selectCategoria.addEventListener('change', () => {
    cargarSeccionesParaCategoria(selectCategoria.value);
  });

  selectSeccion.addEventListener('change', () => {
    cargarSubseccionesParaSeccion(selectSeccion.value);
  });

  selectSubseccion.addEventListener('change', () => {
    if (selectSubseccion.value === 'agregar') {
      nuevaSubseccionInput.style.display = 'block';
    } else {
      nuevaSubseccionInput.style.display = 'none';
      nuevaSubseccionInput.value = '';
    }
  });

  document.getElementById('btn-add-seccion').addEventListener('click', async () => {
    const categoriaID = selectCategoria.value;
    if (!categoriaID) { alert('Primero selecciona una categoría.'); return; }

    let nombre = nuevaSeccionInput.style.display === 'block' ? nuevaSeccionInput.value.trim() : '';
    if (!nombre) nombre = prompt('Ingrese el nombre de la nueva sección:');
    if (!nombre) return;

    try {
      const res = await fetch("{{ route('admin.store') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ nombre: nombre, categoriaID: categoriaID, seccionPadreID: null })
      });
      const data = await res.json();
      if (data.success) {
        todasLasSecciones.push(data.seccion);
        cargarSeccionesParaCategoria(categoriaID);
        selectSeccion.value = data.seccion.numero;
        nuevaSeccionInput.style.display = 'none';
        nuevaSeccionInput.value = '';
        alert('Sección agregada correctamente.');
      } else {
        alert('Error al guardar la sección.');
      }
    } catch (err) {
      console.error(err);
      alert('Ocurrió un error al guardar la nueva sección.');
    }
  });

  // Botón agregar sub-seccion
  document.getElementById('btn-add-subseccion').addEventListener('click', async () => {
    const categoriaID = selectCategoria.value;
    const seccionPadreID = selectSeccion.value;

    if (!categoriaID) { alert('Primero selecciona una categoría.'); return; }
    if (!seccionPadreID || seccionPadreID === 'agregar') { alert('Primero selecciona la sección donde crear la sub-sección.'); return; }

    let nombre = nuevaSubseccionInput.style.display === 'block' ? nuevaSubseccionInput.value.trim() : '';
    if (!nombre) nombre = prompt('Ingrese el nombre de la nueva sub-sección:');
    if (!nombre) return;

    try {
      const res = await fetch("{{ route('admin.store') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ nombre: nombre, categoriaID: categoriaID, seccionPadreID: seccionPadreID })
      });
      const data = await res.json();
      if (data.success) {
        todasLasSecciones.push(data.seccion);
        cargarSubseccionesParaSeccion(seccionPadreID);
        selectSubseccion.value = data.seccion.numero;
        nuevaSubseccionInput.style.display = 'none';
        nuevaSubseccionInput.value = '';
        alert('Sub-sección agregada correctamente.');
      } else {
        alert('Error al guardar la sub-sección.');
      }
    } catch (err) {
      console.error(err);
      alert('Ocurrió un error al guardar la nueva sub-sección.');
    }
  });

  // Adjuntar archivo + vista previa
  btnAdjuntarModal.addEventListener('click', () => archivoAdjuntoModal.click());

  archivoAdjuntoModal.addEventListener('change', () => {
    if (archivoAdjuntoModal.files.length === 0) {
      filePreviewModal.style.display = 'none';
      urlPreview.value = '';
      return;
    }
    const file = archivoAdjuntoModal.files[0];
    const name = file.name.toLowerCase();
    const allowed = ['.pdf', '.doc', '.docx', '.xls', '.xlsx', '.ppt', '.pptx'];
    const ok = allowed.some(ext => name.endsWith(ext));
    if (!ok) {
      alert('⚠️ Archivo no válido. Solo se permiten documentos.');
      archivoAdjuntoModal.value = '';
      filePreviewModal.style.display = 'none';
      return;
    }

    let icon = '';
    if (name.endsWith('.pdf')) icon = 'https://cdn-icons-png.flaticon.com/512/337/337946.png';
    else if (name.endsWith('.doc') || name.endsWith('.docx')) icon = 'https://cdn-icons-png.flaticon.com/512/281/281760.png';
    else if (name.endsWith('.xls') || name.endsWith('.xlsx')) icon = 'https://cdn-icons-png.flaticon.com/512/732/732220.png';
    else icon = 'https://cdn-icons-png.flaticon.com/512/109/109612.png';

    fileIconModal.src = icon;
    fileNameModal.textContent = file.name;
    filePreviewModal.style.display = 'block';

    urlPreview.value = file.name;
  });
});
</script>
