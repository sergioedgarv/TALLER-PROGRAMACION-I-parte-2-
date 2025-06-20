<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!-- Google Fonts: Josefin Sans + Montserrat -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Montserrat:wght@900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&display=swap" rel="stylesheet">

<style>
    .fuente-josefin {
        font-family: 'Josefin Sans', sans-serif;
    }

    .fuente-montserrat-black-italic {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        font-style: italic;
    }

    .texto-seleccionado {
        background-color: rgba(4, 42, 82, 0.7); /* azul intenso */
        color: white;
        border-radius: 8px;
        display: inline-block;
        padding: 2px 3px;
        line-height: 1.5;

        /* Sombras suaves */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

        /* Transición para entrada */
        animation: fadeIn 0.3s ease-in-out;
        cursor: pointer; /* Indica que es clickeable */
    }

    @keyframes fadeIn {
        0% {
            opacity: 1;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    .bounce {
        animation: bounce 0.6s;
    }
</style>

<!-- Contenido Principal -->
<main>
    <!-- Sección Hero -->
    <section class="hero-section">
        <div class="hero-content">

            <h1 class="display-4 fw-bold fuente-montserrat-black-italic">¡WELCOME, al mundo de VAVI!</h1>
            <p class="lead fs-4 fuente-josefin">
                <span id="bounce-text" class="texto-seleccionado">Donde cada día, sos más vos.</span>
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
                    <img src="<?= base_url('img/1.jpg') ?>" class="d-block w-100" alt="Imagen 5">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/11.jpg') ?>" class="d-block w-100" alt="Imagen 6">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="<?= base_url('img/pcaro.jpg') ?>" class="d-block w-100" alt="Imagen 7">
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
                        <p class="card-text">Gran variedad en talles</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="catalogo/2">
                        <img src="<?= base_url('img/neo1.jpg') ?>" class="card-img-top" alt="Chaqueta Denim" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Pantalones</h5>
                        <p class="card-text">Ideal para todas las estaciones.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="catalogo/3">
                        <img src="<?= base_url('img/2.jpg') ?>" class="card-img-top" alt="Jeans Slim Fit" style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Abanicos</h5>
                        <p class="card-text">Gran variedad en diseños</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const bounceText = document.getElementById('bounce-text');

    bounceText.addEventListener('click', () => {
        bounceText.classList.remove('bounce');
        void bounceText.offsetWidth; // Forzar reflow
        bounceText.classList.add('bounce');
    });
</script>

<?= view('templates/footer') ?>
