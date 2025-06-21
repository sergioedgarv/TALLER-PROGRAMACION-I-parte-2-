<!DOCTYPE html>
<!-- Declaración del tipo de documento HTML5 -->
<html lang="es">
<!-- Inicio del documento HTML, idioma español -->

<head>
  <!-- Metadatos del documento -->
  <meta charset="UTF-8" />
  <!-- Codificación de caracteres UTF-8 para soporte internacional -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Configura la ventana gráfica para que el diseño sea responsivo en dispositivos móviles -->
  <title>Gracias por tu compra</title>
  <!-- Título que aparece en la pestaña del navegador -->

  <!-- Bootstrap CSS: framework para estilos y diseño responsivo -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Hoja de estilos personalizada para esta vista -->
  <link rel="stylesheet" href="<?= base_url('css/gracias.css') ?>">
  
  <style>
  .content-wrapper {
  background-image: url('<?= base_url("img/IMG_2221 (1).jpg") ?>');
  /* otros estilos */
}
</style>
</head>

<body>

  <?= view('templates/header') ?>
  <!-- Incluye la plantilla del encabezado común -->

  <div class="content-wrapper">
    <!-- Contenedor principal de contenido para estilos y estructura -->
    <div class="content-box">
      <!-- Caja de contenido específica -->

      <h2>¡Gracias por tu compra :) !</h2>
      <!-- Título de agradecimiento -->

      <?php if (!empty($mensaje)): ?>
        <!-- Verifica si existe un mensaje para mostrar -->
        <div class="alert alert-success mt-3"><?= esc($mensaje) ?></div>
        <!-- Muestra el mensaje dentro de un alert de Bootstrap con margen superior -->
      <?php endif; ?>

      <!-- Botón que enlaza a WhatsApp para contacto sobre el estado de la compra -->
      <a 
        href="https://wa.me/5493795005298" 
        target="_blank" 
        rel="noopener noreferrer" 
        class="btn btn-success btn-whatsapp"
      >
        <!-- Icono SVG oficial de WhatsApp para mejorar la experiencia visual -->
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
          <path d="M13.601 2.326A7.956 7.956 0 0 0 8.002 0a7.998 7.998 0 0 0-7.998 7.998c0 1.408.37 2.72 1.07 3.89L0 16l4.238-1.1a7.96 7.96 0 0 0 3.764.9 7.998 7.998 0 0 0 7.999-7.998 7.955 7.955 0 0 0-1.4-4.476zm-5.6 11.07a6.58 6.58 0 0 1-3.346-.923l-.24-.143-2.516.653.67-2.453-.156-.252a6.59 6.59 0 0 1 1.08-8.948 6.58 6.58 0 0 1 9.3 1.94 6.58 6.58 0 0 1-6.058 9.073z"/>
          <path d="M11.23 9.58c-.15-.07-.88-.43-1.02-.48-.14-.05-.24.07-.34.07-.1.15-.39.48-.48.58-.09.1-.18.11-.34.04-.15-.07-.64-.24-1.22-.75-.45-.4-.75-.9-.84-1.05-.09-.15-.01-.23.06-.3.06-.06.15-.15.22-.23.07-.08.1-.15.15-.25.05-.1.02-.18-.01-.25-.03-.07-.34-.82-.47-1.13-.12-.3-.25-.26-.34-.26-.09 0-.2 0-.31 0-.11 0-.29.1-.44.25-.15.15-.58.57-.58 1.39 0 .82.6 1.62.68 1.73.08.12 1.18 1.8 2.86 2.52.4.17.71.27.95.35.4.13.77.11 1.06.07.32-.05.98-.4 1.12-.78.14-.38.14-.7.1-.78-.05-.07-.15-.11-.31-.18z"/>
        </svg>
        Contactanos por WhatsApp para el estado de tu compra!
      </a>

      <!-- Botón para volver al catálogo y seguir comprando -->
      <a href="catalogo" class="btn btn-primary mt-4">Continuar comprando en la tienda de Vavi</a>

    </div>
  </div>

  <?= view('templates/footer') ?>
  <!-- Incluye la plantilla del pie de página común -->

  <!-- Script de Bootstrap para funcionalidades interactivas -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
