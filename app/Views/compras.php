<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    

    
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .container {
        flex: 1;
    }

    .footer {
        margin-top: auto;
        background-color: #f8f9fa;
        padding: 20px 0;
        text-align: center;
    }

    .icon-container img {
        height: 50px;
        margin-bottom: 10px;
    }

    .icon-label {
        font-size: 0.9rem;
    }

    .icon-container {
        margin-bottom: 20px;
    }
    .icon-label {
        font-weight: 500;
        margin-top: 0.5rem;
    }

    /* CSS */
    .icon-card {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 10px;
        cursor: pointer;
        display: inline-block;
    }

    .icon-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .icon-card:hover .icon-img {
        transform: scale(1.1);
    }

    .info-card {
        position: absolute;
        top: 110%;
        left: 50%;
        transform: translateX(-50%);
        width: 220px;
        padding: 10px;
        background: linear-gradient(135deg, #f8f9fa, #dee2e6);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s ease;
        z-index: 10;
        text-align: center;
    }

    .icon-card:hover .info-card {
        opacity: 1;
        pointer-events: auto;
    }

    .info-card h6 {
        margin: 0;
        font-weight: bold;
        color: #333;
    }

    .info-card p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #555;
    }
</style>

<!-- HTML -->
<div class="container my-5">
<!-- <h1 class="text-center mb-4">Medios de Pago y Formas de Entrega</h1>  -->

    <div class="row justify-content-center mb-3"> <!-- reducido de mb-5 a mb-3 -->
        <div class="col-md-8">
            <div class="card shadow-sm mb-3"> <!-- reducido de mb-4 a mb-3 -->
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Medios de Pago Aceptados</h5>
                    <div class="row text-center justify-content-center gap-4">
                        <!-- Ícono con hover -->
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
                                <p>Hasta 3 cuotas sin interes pagando con mastercard</p>
                            </div>
                        </div>
                        <!-- si eventualmente se desea agregar o quitar metodos de pago, se debe borrar-agregar arriba de este cierre de div -->
                    </div>
                    <p class="text-center mt-4 mb-0">
                        <em>Si tenés dudas sobre cómo pagar, <a href="<?= base_url('contacto') ?>">contactanos</a>.</em>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formas de Entrega -->
    <div class="card shadow-sm mt-3"> <!-- agregado mt-3 para reducir separación -->
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
            <p>Podés escribirnos por <a href="https://wa.me/549XXXXXXXXXX" target="_blank">WhatsApp</a> o a nuestro <a href="mailto:info@tutienda.com">email</a>. ¡Estamos para ayudarte!</p>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>