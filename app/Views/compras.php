<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('css/compras.css') ?>">

<style>

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        background: url('<?= base_url("img/gif1.gif") ?>') no-repeat center center fixed;
        background-size: cover;
        position: relative;
      
    }
</style>


<!-- HTML -->
<div class="container my-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Medios de Pago Aceptados</h5>
                    <div class="row text-center justify-content-center gap-4">
                        <div class="icon-card">
                            <img src="<?= base_url('img/mp.png') ?>" alt="Mercado Pago" class="icon-img">
                            <div class="info-card">
                                <h6>Mercado Pago</h6>
                                <p>Pagá con tarjeta de crédito, débito, dinero en cuenta o en efectivo.</p>
                            </div>
                        </div>

                        <div class="icon-card">
                            <img src="<?= base_url('img/bancaria.png') ?>" alt="Transferencia" class="icon-img">
                            <div class="info-card">
                                <h6>Transferencia Bancaria</h6>
                                <p>Te enviaremos los datos al finalizar tu compra.</p>
                            </div>
                        </div>

                        <div class="icon-card">
                            <img src="<?= base_url('img/efec.png') ?>" alt="Efectivo" class="icon-img">
                            <div class="info-card">
                                <h6>Efectivo</h6>
                                <p>Solo para retiro en local o entrega en zonas habilitadas.</p>
                            </div>
                        </div>

                        <div class="icon-card">
                            <img src="<?= base_url('img/mastercard.png')?>" alt="Mastercard" class="icon-img">
                            <div class="info-card">
                                <h6>Mastercard</h6>
                                <p>Hasta 3 cuotas sin interés pagando con Mastercard.</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-4 mb-0">
                        <em>Si tenés dudas sobre cómo pagar, <a href="<?= base_url('contacto') ?>">contactanos</a>.</em>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formas de Entrega -->
    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Formas de Entrega y Envío</h5>
            <div class="row text-center justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <div class="mb-2">
                        <i class="fas fa-truck fa-2x text-primary"></i>
                    </div>
                    <div>A domicilio</div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <div class="mb-2">
                        <i class="fas fa-store fa-2x text-success"></i>
                    </div>
                    <div>Retiro en local</div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <div class="mb-2">
                        <i class="fas fa-envelope fa-2x text-danger"></i>
                    </div>
                    <div>Correo</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dudas -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <h5>¿Tenés dudas?</h5>
            <p>Podés escribirnos por <a href="https://wa.me/5493795005298?text=Hola%2C%20me%20gustar%C3%ADa%20recibir%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios.%20Muchas%20gracias.
" target="_blank">WhatsApp</a> o a nuestro <a href="mailto:sergioedgarv@gmail.com">email</a>. ¡Estamos para ayudarte!</p>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
