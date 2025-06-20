
<style>
  /* Estilos para el fondo y overlay */
  .content-wrapper {
    position: relative;
    min-height: calc(100vh - 120px);
    background-image: url('<?= base_url("img/ran1.jpg") ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    padding-top: 40px;
    padding-bottom: 40px;
  }

  .content-wrapper::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 0;
  }

  .content-wrapper > main {
    position: relative;
    z-index: 1;
    color: #000000;
  }

  .sombreado_cont {
    text-shadow: 1px 1px 6px #000000;
    color: #ffffff;
  }
</style>

<div class="content-wrapper">
  <main class="container py-5">
    <h1 class="text-center white mb-4 sombreado_cont">Contactanos</h1>

    <div class="row justify-content-center">
      <div class="col-lg-8">

        <!-- Mensaje de éxito -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <!-- Mensaje de error general -->
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <!-- Errores específicos de validación -->
        <?php $errors = session()->getFlashdata('errors') ?? (isset($errors) ? $errors : []); ?>

        <form class="contact-form1 needs-validation" action="<?= base_url('contacto/enviar') ?>" method="POST" enctype="multipart/form-data" novalidate>
          <?= csrf_field() ?>

          <!-- Nombre -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control <?= isset($errors['nombre']) ? 'is-invalid' : '' ?>" id="nombre" name="nombre" required value="<?= old('nombre') ?>">
              <?php if (isset($errors['nombre'])): ?>
                <div class="invalid-feedback"><?= esc($errors['nombre']) ?></div>
              <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" required value="<?= old('email') ?>">
              <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback"><?= esc($errors['email']) ?></div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Teléfono y Motivo -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono (opcional)</label>
              <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= old('telefono') ?>">
            </div>

            <div class="col-md-6">
              <label for="motivo" class="form-label">Motivo de Contacto</label>
              <select class="form-select <?= isset($errors['motivo']) ? 'is-invalid' : '' ?>" id="motivo" name="motivo" required>
                <option value="" disabled <?= old('motivo') ? '' : 'selected' ?>>Seleccionar...</option>
                <?php 
                  $motivos = ['Consulta general', 'Problemas con pedido', 'Cambios y devoluciones', 'Sugerencias', 'Proveedores', 'Trabajar con nosotros'];
                  foreach ($motivos as $m): 
                ?>
                  <option value="<?= esc($m) ?>" <?= old('motivo') === $m ? 'selected' : '' ?>><?= esc($m) ?></option>
                <?php endforeach; ?>
              </select>
              <?php if (isset($errors['motivo'])): ?>
                <div class="invalid-feedback"><?= esc($errors['motivo']) ?></div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Número de Pedido -->
          <div class="mb-3">
            <label for="pedido" class="form-label">Número de Pedido (si aplica)</label>
            <input type="text" class="form-control" id="pedido" name="pedido" value="<?= old('pedido') ?>">
          </div>

          <!-- Mensaje -->
          <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control <?= isset($errors['mensaje']) ? 'is-invalid' : '' ?>" id="mensaje" name="mensaje" rows="5" maxlength="500" required><?= old('mensaje') ?></textarea>
            <small class="text-muted">Máximo 500 caracteres</small>
            <?php if (isset($errors['mensaje'])): ?>
              <div class="invalid-feedback d-block"><?= esc($errors['mensaje']) ?></div>
            <?php endif; ?>
          </div>

          <!-- Método de Respuesta -->
          <div class="mb-3">
            <label class="form-label">Preferencia de contacto:</label>
            <?php 
              $metodos = ['email' => 'Email', 'whatsapp' => 'WhatsApp', 'llamada' => 'Llamada telefónica'];
              $oldMetodos = old('metodo') ?? [];
            ?>
            <?php foreach ($metodos as $value => $label): ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="<?= $value ?>-check" name="metodo[]" value="<?= $value ?>" <?= in_array($value, $oldMetodos) || (empty($oldMetodos) && $value === 'email') ? 'checked' : '' ?>>
                <label class="form-check-label" for="<?= $value ?>-check"><?= $label ?></label>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Archivo Adjunto -->
          <div class="mb-3">
            <label for="archivo" class="form-label">Adjuntar archivo (opcional)</label>
            <input type="file" class="form-control" id="archivo" name="archivo" accept=".jpg,.png,.pdf">
            <small class="text-muted">Formatos permitidos: JPG, PNG, PDF (max. 5MB)</small>
          </div>

          <!-- Políticas y Newsletter -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input <?= isset($errors['politicas']) ? 'is-invalid' : '' ?>" id="politicas" name="politicas" value="1" required <?= old('politicas') ? 'checked' : '' ?>>
            <label class="form-check-label" for="politicas">Acepto la política de privacidad</label>
            <?php if (isset($errors['politicas'])): ?>
              <div class="invalid-feedback d-block"><?= esc($errors['politicas']) ?></div>
            <?php endif; ?>
          </div>
          
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" <?= old('newsletter') ? 'checked' : '' ?>>
            <label class="form-check-label" for="newsletter">Deseo recibir novedades</label>
          </div>

          <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
        </form>
      </div>
    </div>
  </main>
</div>
