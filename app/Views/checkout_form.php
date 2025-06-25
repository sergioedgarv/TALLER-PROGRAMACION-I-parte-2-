<?= view('templates/header') ?>
<!-- Importación de CSS Bootstrap desde CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('css/ckeckout.css') ?>">


<div class="container mt-5 text-success">
    <h2>Finalizar Compra</h2>

    <!-- Mostrar errores de validación del servidor si existen -->
    <?php if (isset($validation) && $validation->getErrors()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <li><?= esc($error) ?></li> <!-- Escapa el error para seguridad -->
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Mostrar error de envío de correo si está seteado -->
    <?php if (isset($errorCorreo)): ?>
        <div class="alert alert-danger"><?= esc($errorCorreo) ?></div>
    <?php endif; ?>

    <!-- Formulario para finalizar la compra -->
    <form id="form-checkout" action="<?= base_url('checkout/procesar') ?>" method="post" novalidate>
        <?= csrf_field() ?> <!-- Campo CSRF para protección -->

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= old('nombre') ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección de envío (En caso de retiro escribir "Retiro")</label>
            <textarea class="form-control" id="direccion" name="direccion" rows="3" required><?= old('direccion') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono"
                value="<?= old('telefono') ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar compra</button>
        <a href="<?= base_url('carrito') ?>" class="btn btn-secondary ms-2">Volver al carrito</a>
    </form>
</div>

<!-- Contenedor fijo con texto y botón para mostrar modal con medios de pago -->
<div id="btn-info-container">
    <div id="btn-info-text">Medios de pago <br><small>(pulsar botón)</small></div>
    <button id="btn-info" type="button" data-bs-toggle="modal" data-bs-target="#infoModal" aria-label="Información">
        <img src="<?= base_url('img/mp2.png') ?>" alt="Info" />
    </button>
</div>

<!-- Modal Bootstrap pequeño y centrado con información de pago -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoModalLabel">Información de pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                Sergio Edgardo Vivero<br>
                CVU: 0000003100031908129292<br>
                Alias: edgv.mp<br>
                CUIT/CUIL: 20437859230<br>
                Mercado Pago
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Importación de JS Bootstrap desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<?= view('templates/footer') ?>
<!-- Al final de checkout_view.php -->
<script src="<?= base_url('js/checkout.js') ?>"></script>

