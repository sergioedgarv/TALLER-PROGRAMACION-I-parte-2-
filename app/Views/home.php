<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!-- Contenido Principal -->
<main>
    <!-- Sección Hero -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="display-3 fw-bold">¡WELCOME, al mundo de VAVI!</h1>
            <p class="lead fs-4">Donde cada día, sos más vos.</p>
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
                    <img src="<?= base_url('img/pcaro.jpg') ?>" class="d-block w-100" alt="Imagen 4">
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
                    <img src="<?= base_url('img/7.jpg') ?>" class="card-img-top" alt="Jeans Slim Fit" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Remerones</h5>
                        <p class="card-text">Gran variedad en colores</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('img/2.jpg') ?>" class="card-img-top" alt="Jeans Slim Fit" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Abanicos</h5>
                        <p class="card-text">Gran variedad en colores</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('img/3.jpg') ?>" class="card-img-top" alt="Chaqueta Denim" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Abanico Norte</h5>
                        <p class="card-text">Ideal para cualquier tipo de look.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 (si la necesitas, aquí iría el cuarto card) -->
        </div>
    </section>
</main>

<?= view('templates/footer') ?>