<?= view('templates/header') ?>
<link rel="stylesheet" href="<?= base_url('style.css') ?>">

<!-- Contenedor principal con altura mínima -->
<div class="container my-5 min-vh-100">

    <!-- Hero Section -->
    <section class="text-center py-5 mb-5 bg-light rounded-3">
        <h1 class="display-4 fw-bold">Quiénes Somos</h1>
        <p class="lead mt-3">Somos un equipo apasionado que busca ofrecer experiencias únicas vistiendo con la mayor frescura</p>
    </section>

    <!-- Equipo con Efecto Hover -->
    <section class="bg-white p-4 rounded shadow-sm">
        <h2 class="text-center mb-5 display-6 fw-bold">Nuestro Equipo</h2>
        
        <div class="row justify-content-center g-4">
            <!-- Tarjeta 1 -->
            <div class="col-md-4 text-center">
                <div class="card border-0 h-100 shadow-hover">
                    <div class="card-body">
                        <img src="<?= base_url('img/soy1.png') ?>" 
                             alt="Edgar Vivero" 
                             class="img-fluid rounded-circle mb-3 shadow"
                             style="width:150px; height:150px; object-fit:cover;">
                        <h5 class="card-title">Sergio Edgardo Vivero</h5>
                        <small class="text-muted d-block mb-2">Comercio, Desarrollo</small>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.linkedin.com/in/edgar-vivero-721654250/" class="text-decoration-none text-primary">
                                <i class="bi bi-linkedin fs-5"></i>
                            </a>
                            <a href="mailto:sergioedgarv@gmail.com" class="text-decoration-none text-primary">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-md-4 text-center">
                <div class="card border-0 h-100 shadow-hover">
                    <div class="card-body">
                        <img src="<?= base_url('img/soy2.jpg') ?>" 
                             alt="Lisandro Valenzuela" 
                             class="img-fluid rounded-circle mb-3 shadow"
                             style="width:150px; height:150px; object-fit:cover;">
                        <h5 class="card-title">Lisandro Valenzuela</h5>
                        <small class="text-muted d-block mb-2">Comercio, Desarrollo</small>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.linkedin.com/in/lisandro-valenzuela-26830627b/
" class="text-decoration-none text-primary">
                                <i class="bi bi-linkedin fs-5"></i>
                            </a>
                         <a href="mailto:lisandrovalenzuela91@gmail.com" class="text-decoration-none text-primary">
    <i class="bi bi-envelope-fill fs-5"></i>
</a>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Cierre del row -->
    </section> <!-- Cierre del section del equipo -->

    <!-- Presentación Mejorada -->
    <section class="mb-5 text-center bg-white p-4 shadow-sm rounded">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p class="fs-5 text-muted">Nos une el compromiso, la creatividad y la voluntad de seguir creciendo juntos. Cada día trabajamos para superar expectativas.</p>
            </div>
        </div>
    </section>
</div> <!-- Cierre del container principal -->

<?= view('templates/footer') ?>
