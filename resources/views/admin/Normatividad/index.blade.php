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

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="../../assets/img/Mesa de trabajo 1-80.jpg" alt="">

    </section>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Introduccion</h3>
            <img src="../../assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="Gestión Estudiantil">
            <p>En este sentido, en la Dirección Administrativa se creó el Departamento de Planeación y Gestión de Calidad, el cual tiene un mecanismo denominado Normateca Interna, cuyo objetivo es la difusión de la normatividad y disposiciones administrativas internas que se aprueben por el Rector.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p>
                Desde 2019, se planteó en el Plan de Desarrollo Institucional 2020-2027, como una de las estrategias previstas el eje de Gestión Institucional con el objetivo de Implementar un Sistema de Gestión de la Calidad basado en estándares nacionales e internacionales para la acreditación y certificación institucional lo cual permitirá el desarrollar mecanismos para evitar la sobreregulación y asegurar la simplificación del marco normativo interno y de atención al estudiante; por lo que se hizo necesario contar con una herramienta de coordinación interna en cada unidad administrativa de CESUN Universidad, que contribuya a la simplificación de disposiciones administrativas que regulan la operación y funcionamiento interno de éstas.              </p>
              <div class="position-relative mt-4">
                <img src="../../assets/img/about-2.jpg" class="img-fluid rounded-4" alt="Plataforma Educativa">
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
