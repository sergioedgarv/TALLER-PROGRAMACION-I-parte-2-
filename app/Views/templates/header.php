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
    background-color: #e83e8c; /* un rosa fuerte */
    border-color: #e83e8c;
  }
  .btn-pink:hover {
    background-color: #d63384;
    border-color: #d63384;
  }
  .dropdown > .dropdown-toggle:active {
    /* Quita el comportamiento "pegajoso" en dispositivos táctiles */
    pointer-events: none;
  }
</style>
</head>

<body class="cuerpo">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid justify-content-between justify-content-lg-center">
      <!-- Logo a la izquierda -->
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <i class="bi bi-stars"></i> VAVI
      </a>

      <!-- Botón toggler -->
      <button
        class="navbar-toggler order-lg-3"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menú centrado -->
      <div
        class="collapse navbar-collapse justify-content-lg-center order-lg-2"
        id="navbarNav"
      >

<ul class="navbar-nav align-items-center">
  <li class="nav-item"><a class="nav-link" href="<?= base_url('') ?>">Principal</a></li>

  <li class="nav-item dropdown">
    <a
      class="nav-link dropdown-toggle"
      href="<?= base_url('catalogo') ?>"
      id="navbarDropdown"
      role="button"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      Catálogo
    </a>


            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url('catalogo') ?>">Todos</a></li>
              <?php if (isset($categorias) && !empty($categorias)): ?>
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
      </div>

      <!-- Carrito a la derecha -->
      <div class="d-flex order-lg-3">
<a class="btn btn-pink text-white rounded-pill px-4" href="<?= base_url('carrito') ?>">
  <i class="bi bi-cart"></i> Carrito
</a>
      </div>
    </div>
  </nav>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
