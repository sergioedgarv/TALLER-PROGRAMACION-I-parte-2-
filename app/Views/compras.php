<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        background: url('<?= base_url("img/gif1.gif") ?>') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        color: #f8f9fa;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(20, 20, 20, 0.7); /* oscurece para mejor contraste */
        z-index: 0;
    }

    .container {
        flex: 1;
        position: relative;
        z-index: 1;
    }
.card {
    background-color: rgba(255, 255, 255, 0.5); /* o 0.6 si querés un poco menos */
    border-radius: 15px;
    backdrop-filter: blur(8px); /* efecto vidrio esmerilado */
    -webkit-backdrop-filter: blur(8px);
}


    .card-title {
        color: #2c3e50;
    }

    .footer {
        margin-top: auto;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px 0;
        text-align: center;
        position: relative;
        z-index: 1;
        color: #f8f9fa;
    }

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
        background: #fff;
        border-radius: 10px;
        padding: 10px;
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
        background: linear-gradient(135deg, #ffffff, #f1f1f1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s ease;
        z-index: 10;
        text-align: center;
        color: #333;
    }

    .icon-card:hover .info-card {
        opacity: 1;
        pointer-events: auto;
    }

    .info-card h6 {
        margin: 0;
        font-weight: bold;
        color: #2c3e50;
    }

    .info-card p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #555;
    }

    a {
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
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
            <p>Podés escribirnos por <a href="https://wa.me/549XXXXXXXXXX" target="_blank">WhatsApp</a> o a nuestro <a href="mailto:info@tutienda.com">email</a>. ¡Estamos para ayudarte!</p>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
