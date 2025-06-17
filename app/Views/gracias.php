<?= view('templates/header') ?>
<div class="container mt-5 text-center">
    <h2>¡Gracias por tu compra!</h2>
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-success mt-3"><?= esc($mensaje) ?></div>
    <?php endif; ?>
    <a href="/catalogo" class="btn btn-primary mt-4">Seguir comprando</a>
</div>
<?= view('templates/footer') ?>
