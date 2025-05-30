<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">


<main class="container py-5">
    <h1 class="text-center mb-4">Contacto</h1>
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> 
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
            <form class="contact-form1" action="<?= base_url('contacto/enviar') ?>" method="POST">

                <!-- Nombre y Email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <!-- Teléfono y Motivo -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono (opcional)</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-md-6">
                        <label for="motivo" class="form-label">Motivo de Contacto</label>
                        <select class="form-select" id="motivo" name="motivo" required>
                            <option value="" disabled selected>Seleccionar...</option>
                            <option>Consulta general</option>
                            <option>Problemas con pedido</option>
                            <option>Cambios y devoluciones</option>
                            <option>Sugerencias</option>
                            <option>Proveedores</option>
                            <option>Trabajar con nosotros</option>
                        </select>
                    </div>
                </div>

                <!-- Número de Pedido -->
                <div class="mb-3">
                    <label for="pedido" class="form-label">Número de Pedido (si aplica)</label>
                    <input type="text" class="form-control" id="pedido" name="pedido">
                </div>

                <!-- Mensaje -->
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" maxlength="500" required></textarea>
                    <small class="text-muted">Máximo 500 caracteres</small>
                </div>

                <!-- Método de Respuesta -->
                <div class="mb-3">
                    <label class="form-label">Preferencia de contacto:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="email-check" name="metodo[]" value="email" checked>
                        <label class="form-check-label" for="email-check">Email</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="whatsapp-check" name="metodo[]" value="whatsapp">
                        <label class="form-check-label" for="whatsapp-check">WhatsApp</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="llamada-check" name="metodo[]" value="llamada">
                        <label class="form-check-label" for="llamada-check">Llamada telefónica</label>
                    </div>
                </div>

                <!-- Archivo Adjunto -->
                <div class="mb-3">
                    <label for="archivo" class="form-label">Adjuntar archivo (opcional)</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" accept=".jpg,.png,.pdf">
                    <small class="text-muted">Formatos permitidos: JPG, PNG, PDF (max. 5MB)</small>
                </div>

                <!-- Políticas y Newsletter -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="politicas" required>
                    <label class="form-check-label" for="politicas">Acepto la política de privacidad</label>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="newsletter">
                    <label class="form-check-label" for="newsletter">Deseo recibir novedades</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</main>
<div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalExitoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-body p-4">
        <div class="mb-3">
          <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        </div>
        <h5 class="mb-3">¡Mensaje enviado exitosamente!</h5>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?= view('templates/footer') ?>
