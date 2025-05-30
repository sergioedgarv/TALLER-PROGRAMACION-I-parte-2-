<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Tu Carrito</h1>

    <?php if (!empty($carrito)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $item): ?>
                    <tr>
                        <td><?= esc($item['id_producto']) ?></td>
                        <td><?= esc($item['cantidad']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>

    <a href="/productos" class="btn btn-secondary">Seguir comprando</a>
</div>
</body>
</html>
