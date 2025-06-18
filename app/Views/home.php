<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!-- Google Fonts: Josefin Sans -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">

<style>
    .fuente-josefin {
        font-family: 'Josefin Sans', sans-serif;
    }

    .texto-seleccionado {
    background-color: rgba(0, 123, 255, 0.4);
    color: white;
    padding: 0 4px;
    border-radius: 2px;
</style>

<style>
.texto-seleccionado {
    background-color: rgba(3, 44, 88, 0.7); /* azul intenso */
    color: white;
    border-radius: 2px;
    /* No padding ni margen para que el fondo cubra solo el texto */
    display: inline; /* o inline-block si quieres */
}

</style>



<!-- Contenido Principal -->
<main>
    <!-- Sección Hero -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="display-3 fw-bold fuente-josefin">¡WELCOME, al mundo de VAVI!</h1>
        <p class="lead fs-4 fuente-josefin">
    <span class="texto-seleccionado">Donde cada día, sos más vos.</span>
</p>
        </div>

        <!-- Carrusel -->
        <div id="autoCarousel" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="<?= base_url('img/fondo.jpg') ?>" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/9.jpg') ?>" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/IMG_2187 (1).jpg') ?>" class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/IMG_2221 (1).jpg') ?>" class="d-block w-100" alt="Imagen 4">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/pcaro.jpg') ?>" class="d-block w-100" alt="Imagen 5">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#autoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#autoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Sección de Productos -->
    <section class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="catalogo/1">
                        <img src="<?= base_url('img/7.jpg') ?>" class="card-img-top" alt="Jeans Slim Fit" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Remerones</h5>
                        <p class="card-text">Gran variedad en colores</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="catalogo/3">
                        <img src="<?= base_url('img/2.jpg') ?>" class="card-img-top" alt="Jeans Slim Fit" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Abanicos</h5>
                        <p class="card-text">Gran variedad en colores</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="catalogo/2">
                        <img src="<?= base_url('img/3.jpg') ?>" class="card-img-top" alt="Chaqueta Denim" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Pantalones</h5>
                        <p class="card-text">Ideal para cualquier tipo de look.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 (opcional) -->
        </div>
    </section>
</main>

<?= view('templates/footer') ?>
