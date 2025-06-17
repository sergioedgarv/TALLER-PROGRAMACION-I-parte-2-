<?= view('templates/header') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2>Finalizar Compra</h2>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('checkout/procesar') ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                   value="<?= isset($validation) ? esc($validation->getOldInput('nombre')) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?= isset($validation) ? esc($validation->getOldInput('email')) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección de envío</label>
            <textarea class="form-control" id="direccion" name="direccion" rows="3" required><?= isset($validation) ? esc($validation->getOldInput('direccion')) : '' ?></textarea>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono"
                   value="<?= isset($validation) ? esc($validation->getOldInput('telefono')) : '' ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar compra</button>
        <a href="<?= base_url('carrito') ?>" class="btn btn-secondary ms-2">Volver al carrito</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?= view('templates/footer') ?>
