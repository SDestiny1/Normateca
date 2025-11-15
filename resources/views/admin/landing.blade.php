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
<button class="float-btn" title="Agregar Documento o URL"
        data-bs-toggle="modal" data-bs-target="#modalAddDoc">
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

  <!-- Modal para agregar usuario -->
  <div class="" id="formAddUser">
    <div>
      <div>
        <form class="" id="formUser">
          <div>
            <label>
              <input type="text" placeholder="Nombre del usuario">
            </label>
          </div>
        </form>
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