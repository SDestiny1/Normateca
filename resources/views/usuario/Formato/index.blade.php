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

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="../../assets/img/Mesa de trabajo 1-80.jpg" alt="">

    </section>

    <!---- Links rápidos ---->
    <div class="container my-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <a class="card h-100 text-decoration-none shadow-sm" href="#procesos">
            <div class="card-body d-flex align-items-center gap-3">
              <i class="bi bi-diagram-3 fs-2 text-primary"></i>
              <div>
                <h5 class="mb-1">------------------</h5>
                <div class="text-secondary small">-----------------</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a class="card h-100 text-decoration-none shadow-sm" href="#rectoria">
            <div class="card-body d-flex align-items-center gap-3">
              <i class="bi bi-journal-text fs-2 text-primary"></i>
              <div>
                <h5 class="mb-1">---------------------</h5>
                <div class="text-secondary small">----------------------</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a class="card h-100 text-decoration-none shadow-sm" href="#direccion">
            <div class="card-body d-flex align-items-center gap-3">
              <i class="bi bi-diagram-3 fs-2 text-primary"></i>
              <div>
                <h5 class="mb-1">---------------</h5>
                <div class="text-secondary small">-------------------</div>
              </div>
            </div>
          </a>
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

  <!-- Formulario para agreagar documentos -->
  <div class=" ">
      <div> </div>
      
  </div>

</body>
</html>

