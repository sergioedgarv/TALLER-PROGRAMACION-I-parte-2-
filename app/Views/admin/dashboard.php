<?= view('templates/header') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Panel de Administración</h2>

    <!-- Mensaje flash -->
    <?php if(session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <!-- Tabla de productos -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id_producto'] ?></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td>$<?= number_format($producto['precio'], 2, ',', '.') ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td>
                        <a href="<?= base_url('productos/editar/' . $producto['id_producto']) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="<?= base_url('productos/eliminar/' . $producto['id_producto']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('productos/crear') ?>" class="btn btn-success mt-3">Agregar nuevo producto</a>
</div>

<?= view('templates/footer') ?>
