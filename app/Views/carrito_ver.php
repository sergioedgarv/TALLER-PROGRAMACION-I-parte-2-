<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-producto {
            max-width: 100px;
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
        .btn-cantidad {
            min-width: 32px;
        }
    </style>
</head>
<body>
<div class="container mt-4 position-relative">
    <!-- Aquí se aplica la clase fs-4 para tamaño menor -->
    <h1 class="mb-4 fs-4">Sus selecciones...</h1>

    <img src="<?= base_url('img/paginawebvavi.jpg') ?>" alt="Descripción de la imagen" 
         style="position: absolute; top: 0; right: 0; width: 150px; opacity: 0.7; pointer-events: none;">

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= esc($mensaje) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($carrito)): ?>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th class="d-none d-md-table-cell">Precio Unitario</th>
                        <th>Cantidad</th>
                        <th class="d-none d-md-table-cell">Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td>
                              <?php if (!empty($item['imagen'])): ?>
                                <img src="<?= base_url('img/' . basename($item['imagen'])) ?>" alt="<?= esc($item['nombre']) ?>" class="img-producto">
                              <?php else: ?>
                                <img src="<?= base_url('img/default.png') ?>" alt="Imagen no disponible" class="img-producto">
                              <?php endif; ?> 
                            </td>
                            <td class="text-start"><?= esc($item['nombre']) ?></td>
                            <td class="d-none d-md-table-cell">$<?= number_format($item['precio'], 2, ',', '.') ?></td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <form action="<?= base_url('carrito/disminuir/' . $item['id_producto']) ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-cantidad" title="Disminuir cantidad">&minus;</button>
                                    </form>

                                    <span><?= esc($item['cantidad']) ?></span>

                                    <form action="<?= base_url('carrito/aumentar/' . $item['id_producto']) ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-cantidad" title="Aumentar cantidad">&plus;</button>
                                    </form>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">$<?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                            <td>
                                <form action="<?= base_url('carrito/eliminar/' . $item['id_producto']) ?>" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end fs-5">Total:</th>
                        <th colspan="3" class="fs-5">$<?= number_format($total, 2, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">El carrito está vacío.</div>
    <?php endif; ?>

<div class="mb-5">
    <a href="<?= base_url('catalogo') ?>" class="btn btn-primary">Seguir comprando</a>
    <a href="<?= base_url('checkout') ?>" class="btn btn-success ms-2">Comprar ahora</a>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= view('templates/footer') ?>
