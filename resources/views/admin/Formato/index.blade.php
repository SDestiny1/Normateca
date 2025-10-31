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

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="../../assets/img/Mesa de trabajo 1-80.jpg" alt="">

    </section>

    <!-- Links rapidos -->
      <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <a class="card h-100 text-decoration-none shadow-sm" href="#">
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
            <a class="card h-100 text-decoration-none shadow-sm" href="#">
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
            <a class="card h-100 text-decoration-none shadow-sm" href="#">
              <div class="card-body d-flex align-items-center gap-3">
                <i class="bi bi-diagram-3 fs-2 text-primary"></i> 
                <div>
                  <h5 class="mb-1">--------------------</h5>
                  <div class="text-secondary small">--------------------</div>
                </div>  
              </div>
            </a>
          </div>
        </div>
      </div>