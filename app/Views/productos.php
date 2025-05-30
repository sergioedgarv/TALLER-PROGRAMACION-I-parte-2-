<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<?php if(session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
    /* Para que el texto dentro de card-body no crezca demasiado y empuje el footer */
    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
    /* Limitar la altura de la descripción */
    .card-text.descripcion {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* número de líneas visibles */
        -webkit-box-orient: vertical;
    }
    /* Imagenes de tamaño uniforme */
    .card-img-top {
        height: 400px;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

</head>
<body>
<div class="container mt-4">

    <h1>Productos disponibles</h1>

    <?php if (!empty($productos)): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($productos as $producto): ?>
                <div class="col">
                    <div class="card h-100 d-flex flex-column">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="<?= esc($producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                        <?php else: ?>
                            <img src="img/1.jpg" class="card-img-top" alt="Imagen no disponible">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                            <p class="card-text descripcion"><?= esc($producto['descripcion']) ?></p>
                            <p class="card-text"><strong>Precio:</strong> $<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                        </div>

                        <div class="card-footer text-center">
                            <a href="<?= base_url('carrito/agregar/' . $producto['id_producto']) ?>" class="btn btn-primary w-100">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= view('templates/footer') ?>
