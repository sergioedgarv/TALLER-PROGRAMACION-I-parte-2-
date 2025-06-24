<!DOCTYPE html>
<html lang="es">
<head class="cabeza">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= esc($title ?? 'VAVI') ?></title>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

<!-- Estilos personalizados -->
<link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>" />
<link rel="stylesheet" href="<?= base_url('css/header.css') ?>">


</head>

<body class="cuerpo">
  <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">

    <!-- Logo + Buscador -->
    <div class="d-flex align-items-center">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center gap-1 me-3" href="<?= base_url('/') ?>">
        <i class="bi bi-stars"></i> VAVI
      </a>

      <!-- Buscador -->
      <form class="d-none d-lg-flex align-items-center" role="search" action="<?= base_url('buscar') ?>" method="GET">
        <input
          class="form-control form-control-sm me-2"
          type="search"
          placeholder="Buscar productos..."
          aria-label="Buscar"
          name="q"
          required
        />
        <button class="btn btn-outline-pink btn-sm" type="submit">Buscar</button>
      </form>
    </div>

    <!-- Toggler para móvil -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

      <!-- Menú -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('') ?>">Principal</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">Catálogo</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('catalogo') ?>">Todos</a></li>
            <?php if (isset($categorias)): ?>
              <?php foreach ($categorias as $cat): ?>
                <li>
                  <a class="dropdown-item" href="<?= base_url('catalogo/' . $cat['id_categoria']) ?>">
                    <?= esc($cat['nombre']) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('quienes_somos') ?>">Quienes Somos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('compras') ?>">Comercialización</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto') ?>">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('terminos') ?>">Términos y condiciones</a></li>
      </ul>

      <!-- Carrito + Usuario -->
<?php
$current_url = current_url(); // o la función que uses para obtener la URL actual
$carrito_url = base_url('carrito');
$active_class = ($current_url == $carrito_url) ? 'btn-pink' : 'btn-outline-pink'; // ejemplo
?>
<div class="d-flex align-items-center gap-3">
  <a class="btn <?= $active_class ?> text-white rounded-pill px-4 d-flex align-items-center gap-2" href="<?= $carrito_url ?>">
    <i class="bi bi-cart"></i>
    <span>Carrito</span>
  </a>
</div>




        <div class="user-menu d-flex align-items-center position-relative">
          <i class="bi bi-person-circle fs-4 me-2" style="color: #d63384;"></i>
          <?php if(session()->get('logged_in')): ?>
            <span class="user-text">Hola <?= esc(session()->get('nombre')) ?></span>
            <div class="user-dropdown">
              <a href="<?= base_url('logout') ?>">Cerrar sesión</a>
            </div>
          <?php else: ?>
            <a href="<?= base_url('Login') ?>" class="text-decoration-none text-pink fw-semibold">Iniciar sesión</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</nav>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>