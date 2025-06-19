<?= view('templates/header') ?>

<div class="container mt-5">
    <h2>Agregar nuevo producto</h2>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('productos/guardar') ?>" method="post">
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required><?= old('descripcion') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" step="0.01" value="<?= old('precio') ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="<?= old('stock') ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_categoria">Categoría</label>
            <select id="id_categoria" name="id_categoria" class="form-select" required>
                <option value="" disabled selected>Seleccione una categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id_categoria'] ?>" <?= old('id_categoria') == $categoria['id_categoria'] ? 'selected' : '' ?>>
                        <?= esc($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= view('templates/footer') ?>
