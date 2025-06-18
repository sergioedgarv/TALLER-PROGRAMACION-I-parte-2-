<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Pago con Mercado Pago</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h1>Pagar con Mercado Pago</h1>

    <!-- Contenedor del botón -->
    <div id="button-checkout"></div>

    <script>
        const mp = new MercadoPago('TU_PUBLIC_KEY_AQUI', {
            locale: 'es-AR'
        });

        mp.checkout({
            preference: {
                id: '<?= esc($preferenceId) ?>'
            },
            render: {
                container: '#button-checkout', // Indica dónde se mostrará el botón
                label: 'Pagar con Mercado Pago'
            }
        });
    </script>
</body>
</html>
