<?= view('templates/header') ?>

<div class="container mt-5">
    <h2>Editar producto</h2>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('productos/actualizar/' . $producto['id_producto']) ?>" method="post" enctype="multipart/form-data">
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
            <input type="number" name="precio" class="form-control" step="0.01" value="<?= esc($producto['precio']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="<?= esc($producto['stock']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <select name="id_faraon" class="form-select" required>
                <option value="" disabled>Seleccione una categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $producto['id_faraon'] ? 'selected' : '' ?>>
                        <?= esc($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Imagen actual:</label><br>
            <?php if (!empty($producto['imagen'])): ?>
            <img src="<?= base_url('img/' . $producto['imagen']) ?>" alt="Imagen actual" class="img-thumbnail" width="200">


            <?php else: ?>
                <p>No hay imagen cargada</p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Nueva imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= view('templates/footer') ?>
