<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gracias por tu compra</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Contenedor con imagen de fondo */
    .content-wrapper {
      flex: 1 0 auto;
      position: relative;
      background-image: url('img/IMG_2221 (1).jpg'); /* Cambia por la ruta real */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }
    /* Fondo semitransparente para el contenido */
    .content-box {
      background-color: rgba(255, 255, 255, 0.85);
      padding: 2rem;
      border-radius: 8px;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    footer {
      flex-shrink: 0;
      background-color: #f8f9fa;
      padding: 1rem 0;
      text-align: center;
    }
    .btn-whatsapp {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>

  <?= view('templates/header') ?>

  <div class="content-wrapper">
    <div class="content-box">
      <h2>¡Gracias por tu compra :) !</h2>
      <?php if (!empty($mensaje)): ?>
        <div class="alert alert-success mt-3"><?= esc($mensaje) ?></div>
      <?php endif; ?>
      
      <a 
        href="https://wa.me/5493795005298" 
        target="_blank" 
        rel="noopener noreferrer" 
        class="btn btn-success btn-whatsapp"
      >
        <!-- Icono WhatsApp SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
          <path d="M13.601 2.326A7.956 7.956 0 0 0 8.002 0a7.998 7.998 0 0 0-7.998 7.998c0 1.408.37 2.72 1.07 3.89L0 16l4.238-1.1a7.96 7.96 0 0 0 3.764.9 7.998 7.998 0 0 0 7.999-7.998 7.955 7.955 0 0 0-1.4-4.476zm-5.6 11.07a6.58 6.58 0 0 1-3.346-.923l-.24-.143-2.516.653.67-2.453-.156-.252a6.59 6.59 0 0 1 1.08-8.948 6.58 6.58 0 0 1 9.3 1.94 6.58 6.58 0 0 1-6.058 9.073z"/>
          <path d="M11.23 9.58c-.15-.07-.88-.43-1.02-.48-.14-.05-.24.07-.34.07-.1.15-.39.48-.48.58-.09.1-.18.11-.34.04-.15-.07-.64-.24-1.22-.75-.45-.4-.75-.9-.84-1.05-.09-.15-.01-.23.06-.3.06-.06.15-.15.22-.23.07-.08.1-.15.15-.25.05-.1.02-.18-.01-.25-.03-.07-.34-.82-.47-1.13-.12-.3-.25-.26-.34-.26-.09 0-.2 0-.31 0-.11 0-.29.1-.44.25-.15.15-.58.57-.58 1.39 0 .82.6 1.62.68 1.73.08.12 1.18 1.8 2.86 2.52.4.17.71.27.95.35.4.13.77.11 1.06.07.32-.05.98-.4 1.12-.78.14-.38.14-.7.1-.78-.05-.07-.15-.11-.31-.18z"/>
        </svg>
        Contactanos por WhatsApp para el estado de tu compra!
      </a>
      <a href="catalogo" class="btn btn-primary mt-4">Continuar comprando en la tienda de Vavi</a>

    </div>
  </div>


      
  <?= view('templates/footer') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
