<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mi Tienda - <?= esc($title ?? '') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/footer.css') ?>">
</head>
<body>
    <main class="container my-5">
        <!-- Aquí va el contenido variable de cada página -->
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer-vavi py-4">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">© <?= date('Y') ?> Taller de Programación I</p>
                <p class="mb-0 small">Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
