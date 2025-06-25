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
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }
</style>

<div class="container my-5" role="main" aria-label="Sección comercialización">
    <!-- Cómo Comprar -->
    <section aria-labelledby="como-comprar" class="mb-5">
        <h2 id="como-comprar" class="section-title">¿Cómo Comprar?</h2>
        <div class="alert-info-custom" role="region" aria-live="polite">
            <ol>
                <li>Agregá los productos deseados a tu carrito.</li>
                <li>Ingresá a la sección <strong>Carrito</strong> y hacé clic en <strong>Comprar</strong>.</li>
                <li>Completá tus datos personales y dirección de envío con cuidado para evitar errores.</li>
                <li>Elegí tu método de pago preferido y seguí las instrucciones específicas.</li>
                <li>Si elegís <strong>Transferencia Bancaria</strong>, enviá el comprobante por WhatsApp o email para validar tu pago.</li>
            </ol>
            <p class="mt-3 mb-0"><strong>Nota:</strong> Confirmaremos tu pedido una vez recibido y validado el pago.</p>
            <a href="<?= base_url('carrito') ?>" class="btn-go-cart" aria-label="Ir a carrito de compras">Ir al carrito</a>
        </div>
    </section>

    <!-- Medios de Pago -->
    <section aria-labelledby="medios-pago" class="mb-5">
        <h2 id="medios-pago" class="section-title">Medios de Pago Aceptados</h2>
        <div class="row justify-content-center gap-4">
            <div class="col-12 col-md-6 col-lg-5">
                <article class="icon-card" role="region" aria-label="Mercado Pago">
                    <img src="<?= base_url('img/mp.png') ?>" alt="Logo Mercado Pago" class="icon-img" loading="lazy">
                    <div class="info-card">
                        <h6>Mercado Pago</h6>
                        <p>Pagá con tarjeta de crédito, débito, dinero en cuenta o en efectivo.<br>
                        Al finalizar tu compra, seleccioná Mercado Pago y seguí las instrucciones en pantalla.</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <article class="icon-card" role="region" aria-label="Transferencia Bancaria">
                    <img src="<?= base_url('img/bancaria.png') ?>" alt="Logo Transferencia Bancaria" class="icon-img" loading="lazy">
                    <div class="info-card">
                        <h6>Transferencia Bancaria</h6>
                        <p>Recibirás los datos bancarios al finalizar la compra.<br>
                        Envianos el comprobante por WhatsApp o email para confirmar tu pago y procesar el pedido.</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <article class="icon-card" role="region" aria-label="Pago en Efectivo">
                    <img src="<?= base_url('img/efec.png') ?>" alt="Pago en Efectivo" class="icon-img" loading="lazy">
                    <div class="info-card">
                        <h6>Efectivo</h6>
                        <p>Pagá en efectivo al retirar en nuestro local o al recibir tu pedido en domicilio (zonas habilitadas).</p>
                    </div>
                </article>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <article class="icon-card" role="region" aria-label="Mastercard">
                    <img src="<?= base_url('img/mastercard.png')?>" alt="Logo Mastercard" class="icon-img" loading="lazy">
                    <div class="info-card">
                        <h6>Mastercard</h6>
                        <p>Disfrutá de hasta 3 cuotas sin interés pagando con Mastercard a través de Mercado Pago.</p>
                    </div>
                </article>
            </div>
        </div>
        <p class="text-center mt-4 contact-links">
            <em>¿Tenés dudas sobre cómo pagar? <a href="<?= base_url('contacto') ?>">Contactanos</a>.</em>
        </p>
    </section>

    <!-- Formas de Entrega -->
    <section aria-labelledby="formas-entrega" class="mb-5">
        <h2 id="formas-entrega" class="section-title">Formas de Entrega y Envío</h2>
        <div class="row justify-content-center gap-4">
            <div class="col-12 col-sm-6 col-md-4">
                <article class="delivery-method" role="region" aria-label="Envío a domicilio">
                    <i class="fas fa-truck fa-3x text-primary" aria-hidden="true"></i>
                    <h6 class="mt-3 mb-2">Envío a domicilio</h6>
                    <p>Recibí tu compra en la dirección que indiques al finalizar la compra. Coordinamos el envío una vez confirmado el pago.</p>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <article class="delivery-method" role="region" aria-label="Retiro en local">
                    <i class="fas fa-store fa-3x text-success" aria-hidden="true"></i>
                    <h6 class="mt-3 mb-2">Retiro en local</h6>
                    <p>Podés pasar a retirar tu pedido en nuestro local. Te avisaremos cuando esté listo. Para coordinar horarios, contactanos.</p>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <article class="delivery-method" role="region" aria-label="Envío por correo">
                    <i class="fas fa-envelope fa-3x text-danger" aria-hidden="true"></i>
                    <h6 class="mt-3 mb-2">Envío por correo</h6>
                    <p>Enviamos tu compra a través de correo postal a todo el país. Te informaremos el número de seguimiento para que puedas rastrear tu pedido.</p>
                </article>
            </div>
        </div>

        <!-- Mensaje final destacado en rojo -->
        <div class="final-warning" role="alert" aria-live="assertive">
            <strong>Importante:</strong> Al finalizar la compra, indicá correctamente la dirección de entrega o seleccioná "Retiro en local". Si realizás transferencia bancaria, enviá el comprobante para confirmar y procesar tu pedido.
        </div>
    </section>

    <!-- Contacto -->
    <section aria-labelledby="contacto" class="text-center mt-5">
        <h2 id="contacto" class="section-title">¿Tenés dudas?</h2>
        <p>
            Escribinos por 
            <a href="https://wa.me/5493795005298?text=Hola%2C%20me%20gustar%C3%ADa%20recibir%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios.%20Muchas%20gracias." target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp">WhatsApp</a> 
            o a nuestro 
            <a href="mailto:sergioedgarv@gmail.com" aria-label="Enviar email">email</a>. 
            ¡Estamos para ayudarte!
        </p>
    </section>
</div>

<?= view('templates/footer') ?>
