<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

/* Fondo aplicado al cuerpo del contenido principal */
.content-wrap {
    flex: 1 0 auto;
    background-image: url('<?= base_url('img/ran1.jpg') ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 40px 0;
    min-height: 500px; /* asegura altura visible incluso sin contenido */
}

footer {
    flex-shrink: 0;
    background-color: #f8f9fa;
    padding: 20px 0;
    text-align: center;
}

.card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.card-text.descripcion {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.card-img-top {
    height: 400px;
    width: 100%;
    object-fit: cover;
    object-position: center;
}
</style>
</head>
<body>

<div class="content-wrap">
    <div class="container mt-4">

 <!-- Mostrar mensaje flash si existe -->
   <?php if(session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-warning text-center">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>




        <!-- Título dinámico: muestra categoría o término buscado -->
        <h2 class="text-white mb-4 text-center">
            <?= isset($categoria) ? esc($categoria) : 'Productos' ?>
        </h2>

        <?php if (!empty($productos)): ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($productos as $producto): ?>
                    <div class="col">
                        <div class="card h-100 d-flex flex-column">
                            <?php if (!empty($producto['imagen'])): ?>
                                <img src="<?= base_url('img/' . basename($producto['imagen'])) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
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
            <div class="text-center text-white py-5">
                <h3>No hay productos disponibles en esta categoría.</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

<footer>
    <?= view('templates/footer') ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
