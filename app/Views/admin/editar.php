<?= view('templates/header') ?>
<div class="container mt-5">
    <h2>Editar producto</h2>
    <form action="<?= base_url('productos/actualizar/' . $producto['id_producto']) ?>" method="post">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" required><?= esc($producto['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" class="form-control" value="<?= esc($producto['precio']) ?>" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="<?= esc($producto['stock']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= view('templates/footer') ?>
