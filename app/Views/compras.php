<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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
    .icono-envio {
        height: 45px;
        margin-right: 10px;
    }
</style>
<div class="container my-5">
    <h1 class="text-center mb-4">Medios de Pago y Formas de Entrega</h1>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Medios de Pago Aceptados</h5>
                    <div class="d-flex justify-content-around align-items-center mb-3 flex-wrap">
                        <img src="<?= base_url('img/mp.png') ?>" alt="Mercado Pago" style="height: 50px;">
                        <img src="<?= base_url('img/bancaria.png') ?>" alt="Transferencia Bancaria" style="height: 50px;">
                        <img src="<?= base_url('img/efec.png') ?>" alt="Efectivo" style="height: 50px;">
                        <img src="<?= base_url('img/visa.png') ?>" alt="Visa" style="height: 50px;">
                        <img src="<?= base_url('img/mastercard.png') ?>" alt="Mastercard" style="height: 50px;">
                        <img src="<?= base_url('img/naranja.png') ?>" alt="Tarjeta Naranja" style="height: 50px;">
                    </div>
                    <ul>
                        <li><strong>Mercado Pago:</strong> Pagá con tarjeta de crédito, débito, dinero en cuenta o en efectivo en puntos de pago.</li>
                        <li><strong>Transferencia Bancaria:</strong> Recibirás los datos bancarios al finalizar tu compra.</li>
                        <li><strong>Efectivo:</strong> Disponible para retiros en nuestro local o envíos contra entrega en zonas habilitadas.</li>
                        <li><strong>Tarjeta Naranja:</strong> ¡6 cuotas sin interés!</li>
                        <li><strong>Tarjetas de crédito y débito:</strong> Visa, Mastercard y más.</li>
                    </ul>
                    <p class="text-center mb-0">
                        <em>Si tenés dudas sobre cómo pagar, <a href="<?= base_url('contacto') ?>">contactanos</a>.</em>
                    </p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Formas de Entrega y Envío</h5>
                    <div class="d-flex justify-content-around align-items-center mb-3 flex-wrap">
                        <img src="<?= base_url('img/envio-domicilio.png') ?>" alt="Envío a domicilio" class="icono-envio">
                        <img src="<?= base_url('img/retira-local.png') ?>" alt="Retiro en local" class="icono-envio">
                        <img src="<?= base_url('img/correo.png') ?>" alt="Correo" class="icono-envio">
                    </div>
                    <ul>
                        <li><strong>Envío a domicilio:</strong> Enviamos a todo el país a través de Correo Argentino y mensajería privada en CABA y GBA.</li>
                        <li><strong>Retiro en local:</strong> Podés retirar tu compra en nuestro local de lunes a sábado de 10 a 19 hs.</li>
                        <li><strong>Envío express:</strong> Entrega en el día para compras realizadas antes de las 14 hs (sólo CABA).</li>
                        <li><strong>Seguimiento:</strong> Recibí el código de seguimiento de tu envío por email.</li>
                        <li><strong>Envío gratis:</strong> En compras superiores a $50.000.</li>
                    </ul>
                    <p class="text-center mb-0">
                        <em>Consultá <a href="<?= base_url('contacto') ?>">zonas y costos de envío</a> antes de finalizar tu compra.</em>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <h5>¿Tenés dudas?</h5>
            <p>Podés escribirnos por <a href="https://wa.me/549XXXXXXXXXX" target="_blank">WhatsApp</a> o a nuestro <a href="mailto:info@tutienda.com">email</a>. ¡Estamos para ayudarte!</p>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
