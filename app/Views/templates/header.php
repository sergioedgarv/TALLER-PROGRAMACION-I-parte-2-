<!DOCTYPE html>
<html lang="es">
<head class="cabeza">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= esc($title ?? 'VAVI') ?></title>

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    .dropdown:hover > .dropdown-menu {
      display: block;
    }
    .btn-pink {
      background-color: #e83e8c;
      border-color: #e83e8c;
    }
    .btn-pink:hover {
      background-color: #d63384;
      border-color: #d63384;
    }
    .btn-outline-pink {
      color: #e83e8c;
      border-color: #e83e8c;
    }
    .btn-outline-pink:hover {
      background-color: #e83e8c;
      color: white;
      border-color: #d63384;
    }
    .dropdown > .dropdown-toggle:active {
      pointer-events: none;
    }

    .user-text {
      background-color: rgba(214, 51, 132, 0.4);
      padding: 2px 6px;
      border-radius: 4px;
      color: #fff;
      font-weight: 600;
    }

    .user-container:hover .user-text {
      display: inline;
    }

    .user-menu {
      position: relative;
      display: inline-block;
      cursor: pointer;
      color: white;
    }

    .user-dropdown {
      display: none;
      position: absolute;
      top: 110%;
      left: 50%;
      transform: translateX(-50%);
      background-color: #d63384cc;
      padding: 8px 12px;
      border-radius: 6px;
      white-space: nowrap;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      z-index: 1000;
      min-width: 120px;
      text-align: center;
    }

    .user-menu:hover .user-dropdown {
      display: block;
    }

    .user-dropdown a {
      color: white;
      text-decoration: none;
      font-weight: 600;
    }

    .user-dropdown a:hover {
      text-decoration: underline;
    }

    /* Previene saltos de línea en los ítems */
    .navbar-nav .nav-link {
      white-space: nowrap;
    }

    @media (max-width: 991.98px) {
      .search-form {
        width: 100%;
        margin-top: 10px;
      }
    }
    ///////////

    
  </style>
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

    <!-- Menú + Carrito + Usuario -->
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
      <div class="d-flex align-items-center gap-3">
<a class="btn btn-pink text-white rounded-pill px-4 d-flex align-items-center gap-2" href="<?= base_url('carrito') ?>">
  <i class="bi bi-cart"></i>
  <span>Carrito</span>
</a>



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