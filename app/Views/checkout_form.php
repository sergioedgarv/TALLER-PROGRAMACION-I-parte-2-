<?= view('templates/header') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Contenedor fijo para botón + texto */
#btn-info-container {
    position: fixed;
    top: 90px; /* Ajusta según la altura de tu navbar y botón "Hola flor" */
    right: 30px;
    z-index: 1050;
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.9);
    padding: 5px 12px;
    border-radius: 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

#btn-info {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
}
#btn-info img {
    width: 72px;
    height: 72px;
    object-fit: contain;
    border-radius: 30%;
    border: 2px solid #eee;
    background: #fff;
}

/* Texto al lado del botón */
#btn-info-text {
    font-size: 0.9rem;
    font-weight: 600;
    color: #333;
    white-space: nowrap;
    user-select: none;
}
</style>

<div class="container mt-5 text-success">
    <h2>Finalizar Compra</h2>

    <!-- Mostrar errores de validación del servidor -->
    <?php if (isset($validation) && $validation->getErrors()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Mostrar error de envío de correo -->
    <?php if (isset($errorCorreo)): ?>
        <div class="alert alert-danger"><?= esc($errorCorreo) ?></div>
    <?php endif; ?>

    <form id="form-checkout" action="<?= base_url('checkout/procesar') ?>" method="post" novalidate>
        <?= csrf_field() ?>

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
            <label for="direccion" class="form-label">Dirección de envío</label>
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

<!-- Contenedor fijo con texto + botón -->
<div id="btn-info-container">
    <div id="btn-info-text">Medios de pago <br><small>(pulsar botón)</small></div>
    <button id="btn-info" type="button" data-bs-toggle="modal" data-bs-target="#infoModal" aria-label="Información">
        <img src="<?= base_url('img/mp2.png') ?>" alt="Info" />
    </button>
</div>

<!-- Modal Bootstrap pequeño y centrado -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionamos el formulario por ID para evitar confusión
    const form = document.querySelector('#form-checkout');
    if (!form) {
        console.error('Formulario no encontrado');
        return;
    }

    const inputs = {
        nombre: form.querySelector('#nombre'),
        email: form.querySelector('#email'),
        direccion: form.querySelector('#direccion'),
        telefono: form.querySelector('#telefono')
    };

    function validarEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function mostrarError(input, mensaje) {
        let errorDiv = input.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('text-danger')) {
            errorDiv = document.createElement('div');
            errorDiv.classList.add('text-danger', 'mt-1');
            input.parentNode.insertBefore(errorDiv, input.nextSibling);
        }
        errorDiv.textContent = mensaje;
        input.classList.add('is-invalid');
    }

    function limpiarError(input) {
        let errorDiv = input.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('text-danger')) {
            errorDiv.remove();
        }
        input.classList.remove('is-invalid');
    }

    function validarCampo(input) {
        const valor = input.value.trim();
        limpiarError(input);

        switch (input.id) {
            case 'nombre':
                if (valor.length < 3) {
                    mostrarError(input, 'El nombre completo debe tener al menos 3 caracteres.');
                    return false;
                }
                break;
            case 'email':
                if (!validarEmail(valor)) {
                    mostrarError(input, 'Por favor, ingresa un correo electrónico válido.');
                    return false;
                }
                break;
            case 'direccion':
                if (valor.length < 5) {
                    mostrarError(input, 'La dirección debe tener al menos 5 caracteres.');
                    return false;
                }
                break;
            case 'telefono':
                if (valor.length < 7) {
                    mostrarError(input, 'El teléfono debe tener al menos 7 caracteres.');
                    return false;
                }
                break;
        }
        return true;
    }

    form.addEventListener('submit', function (e) {
        let valido = true;
        for (const key in inputs) {
            if (!validarCampo(inputs[key])) {
                valido = false;
            }
        }
        if (!valido) {
            e.preventDefault();
        }
    });

    for (const key in inputs) {
        inputs[key].addEventListener('blur', function () {
            validarCampo(this);
        });
    }
});
</script>

<?= view('templates/footer') ?>
