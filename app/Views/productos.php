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
</head>
<body>
<div class="container mt-4">

    <h1>Productos disponibles</h1>


    <?php if (!empty($productos)): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($productos as $producto): ?>
                <div class="col">
                    <div class="card h-100">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="<?= esc($producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                        <?php else: ?> <!-- eliminar este else y analizar mejor el if de arriba -->
                            <img src="img\1.jpg" class="card-img-top" alt="Imagen no disponible">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                            <p class="card-text"><?= esc($producto['descripcion']) ?></p>
                            <p class="card-text"><strong>Precio:</strong> $<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                        </div>
                        <div class="card-footer text-center">
                            
                            <a href="<?= base_url('carrito/agregar/' . $producto['id_producto']) ?>" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>

</div>
</body>
</html>

<?= view('templates/footer') ?>