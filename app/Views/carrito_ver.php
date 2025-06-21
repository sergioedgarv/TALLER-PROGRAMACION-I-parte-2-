<?= view('templates/header') ?>
<!-- Incluye la plantilla del encabezado común (header) -->

<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<!-- Enlace a la hoja de estilos CSS general del sitio -->

<!DOCTYPE html>
<!-- Declaración del tipo de documento HTML5 -->
<html lang="es">
<!-- Inicio del documento HTML con idioma español -->

<head>
    <meta charset="UTF-8">
    <!-- Define la codificación de caracteres como UTF-8 -->
    <title>Carrito de Compras</title>
    <!-- Título que aparece en la pestaña del navegador -->

    <!-- Enlace a la hoja de estilos de Bootstrap desde CDN para estilos y diseño responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace a la hoja de estilos específica para la página del carrito -->
    <link rel="stylesheet" href="<?= base_url('css/carrito.css') ?>">
</head>

<body>
<div class="container mt-4 position-relative">
    <!-- Contenedor principal con margen superior y posición relativa para elementos posicionados dentro -->

    <h1 class="mb-4 fs-4">Sus selecciones...</h1>
    <!-- Título principal con margen inferior y tamaño de fuente reducido (fs-4) -->

    <img src="<?= base_url('img/paginawebvavi.jpg') ?>" alt="Descripción de la imagen" 
         style="position: absolute; top: 0; right: 0; width: 150px; opacity: 0.7; pointer-events: none;">
    <!-- Imagen decorativa posicionada en la esquina superior derecha con transparencia y sin interactividad -->

    <?php if (!empty($mensaje)): ?>
        <!-- Si existe un mensaje para mostrar -->
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= esc($mensaje) ?>
            <!-- Muestra el mensaje protegido contra XSS -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            <!-- Botón para cerrar la alerta -->
        </div>
    <?php endif; ?>

    <?php if (!empty($carrito)): ?>
        <!-- Si el carrito no está vacío -->
        <div class="table-responsive">
            <!-- Contenedor que hace la tabla responsiva en pantallas pequeñas -->
            <table class="table table-bordered align-middle text-center">
                <!-- Tabla con bordes, contenido centrado vertical y horizontalmente -->
                <thead class="table-light">
                    <!-- Encabezado de tabla con fondo claro -->
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th class="d-none d-md-table-cell">Precio Unitario</th>
                        <!-- Oculto en pantallas pequeñas -->
                        <th>Cantidad</th>
                        <th class="d-none d-md-table-cell">Subtotal</th>
                        <!-- Oculto en pantallas pequeñas -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <!-- Recorre cada producto en el carrito -->
                        <tr>
                            <td>
                              <?php if (!empty($item['imagen'])): ?>
                                <!-- Si el producto tiene imagen -->
                                <img src="<?= base_url('img/' . basename($item['imagen'])) ?>" alt="<?= esc($item['nombre']) ?>" class="img-producto">
                                <!-- Muestra la imagen del producto -->
                              <?php else: ?>
                                <!-- Si no tiene imagen, muestra una imagen por defecto -->
                                <img src="<?= base_url('img/default.png') ?>" alt="Imagen no disponible" class="img-producto">
                              <?php endif; ?> 
                            </td>
                            <td class="text-start"><?= esc($item['nombre']) ?></td>
                            <!-- Nombre del producto alineado a la izquierda -->
                            <td class="d-none d-md-table-cell">$<?= number_format($item['precio'], 2, ',', '.') ?></td>
                            <!-- Precio unitario formateado, oculto en pantallas pequeñas -->
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <!-- Controles para disminuir y aumentar cantidad con botones pequeños -->
                                    <form action="<?= base_url('carrito/disminuir/' . $item['id_producto']) ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-cantidad" title="Disminuir cantidad">&minus;</button>
                                    </form>

                                    <span><?= esc($item['cantidad']) ?></span>
                                    <!-- Muestra la cantidad actual -->

                                    <form action="<?= base_url('carrito/aumentar/' . $item['id_producto']) ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-cantidad" title="Aumentar cantidad">&plus;</button>
                                    </form>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">$<?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                            <!-- Subtotal formateado, oculto en pantallas pequeñas -->
                            <td>
                                <form action="<?= base_url('carrito/eliminar/' . $item['id_producto']) ?>" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                    <!-- Formulario para eliminar producto con confirmación -->
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end fs-5">Total:</th>
                        <!-- Celda que ocupa 3 columnas, texto alineado a la derecha y tamaño de fuente grande -->
                        <th colspan="3" class="fs-5">$<?= number_format($total, 2, ',', '.') ?></th>
                        <!-- Total formateado que ocupa 3 columnas -->
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php else: ?>
        <!-- Si el carrito está vacío -->
        <div class="alert alert-info">El carrito está vacío.</div>
    <?php endif; ?>

<div class="mb-5">
    <!-- Contenedor con margen inferior para los botones -->
    <a href="<?= base_url('catalogo') ?>" class="btn btn-primary">Seguir comprando</a>
    <!-- Botón para volver al catálogo -->
    <a href="<?= base_url('checkout') ?>" class="btn btn-success ms-2">Comprar ahora</a>
    <!-- Botón para proceder a la compra -->
</div>

</div>

<!-- Script de Bootstrap para funcionalidades interactivas -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?= view('templates/footer') ?>
<!-- Incluye la plantilla del pie de página común (footer) -->
