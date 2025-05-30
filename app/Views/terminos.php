<?= view('templates/header') ?>

<style>
    main.legal-container {
        background-color: #f8f9fa;
    }
    
    article.legal-content {
        background-color: #fff;
        border-radius: 10px;
        padding: 3rem;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
        line-height: 1.6;
        font-size: 1.0rem; /* Nuevo */
    }
    
    h1, h2 {
        color: #333;
    }
    
    h2 {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: .5rem;
        margin-bottom: 1rem;
        margin-top: 2rem;
        font-size: 1.35rem; /* Nuevo tamaño base */
    }
    
    /* Texto legal detallado */
    .legal-content p {
        font-size: 1.0rem; /* Igual que el contenedor */
    }
    
    @media (max-width: 768px) {
        article.legal-content {
            padding: 2rem;
            font-size: 0.8rem; /* Reducción móvil */
        }
        
        h1 {
            font-size: 1.4rem;
        }
        
        h2 {
            font-size: 1.2rem;
        }
        
        .legal-content p {
            font-size: 0.8rem; /* Reducción móvil */
        }
    }
</style>


<main class="container py-5 legal-container">
    <h1 class="mb-4 text-center">Términos y Condiciones de Uso</h1>
    
    <article class="legal-content">
        
        <section>
            <h2>1. Aceptación de los Términos</h2>
            <p>Al acceder y utilizar este sitio web, propiedad de <strong>VAVI</strong>, usted acepta cumplir con estos Términos y Condiciones, así como con todas las leyes y regulaciones aplicables en la República Argentina.</p>
        </section>

        <section>
            <h2>2. Información del Vendedor</h2>
            <p>De acuerdo a la Ley N° 24.240 de Defensa del Consumidor, informamos que VAVI es una tienda de indumentaria registrada en Argentina. Cualquier consulta o reclamo puede dirigirse a nuestro correo electrónico o por WhatsApp, disponibles en la sección de contacto.</p>
        </section>

        <section>
            <h2>3. Obligaciones del Cliente</h2>
            <p>El usuario se compromete a brindar información veraz, mantener la confidencialidad de sus datos de acceso y respetar las condiciones de compra, cambios y devoluciones detalladas a continuación.</p>
        </section>

        <section>
            <h2>4. Políticas de Compra</h2>
            <p>Las compras realizadas a través de nuestro sitio están sujetas a disponibilidad de stock. Todos los precios están expresados en pesos argentinos e incluyen IVA. Una vez confirmado el pago, se procesará el envío o retiro correspondiente.</p>
        </section>

        <section>
            <h2>5. Cambios y Devoluciones</h2>
            <p>Podés realizar cambios dentro de los 10 días de recibido el producto, siempre que se encuentre en perfectas condiciones y con su etiqueta original. No se realizan devoluciones de dinero salvo en casos de fallas, conforme al Art. 34 de la Ley 24.240.</p>
        </section>

        <section>
            <h2>6. Propiedad Intelectual</h2>
            <p>Todo el contenido presente en este sitio (imágenes, textos, diseño gráfico, etc.) es propiedad de VAVI o sus licenciantes, y está protegido por la legislación argentina de derechos de autor.</p>
        </section>

        <section>
            <h2>7. Privacidad y Protección de Datos</h2>
            <p>Los datos personales suministrados por el usuario serán tratados con confidencialidad y conforme a la Ley de Protección de Datos Personales (Ley N° 25.326).</p>
        </section>

        <section>
            <h2>8. Limitación de Responsabilidad</h2>
            <p>VAVI no será responsable por daños derivados del mal uso del sitio o por problemas técnicos ajenos a su control. Nos reservamos el derecho de modificar productos, precios y políticas sin previo aviso.</p>
        </section>

        <section>
            <h2>9. Jurisdicción</h2>
            <p>Ante cualquier conflicto que pudiera surgir en relación con la utilización del sitio o los servicios ofrecidos, las partes se someterán a la jurisdicción de los tribunales ordinarios de la Ciudad de Corrientes, renunciando a cualquier otro fuero.</p>
        </section>

    </article>
</main>

<?= view('templates/footer') ?>
