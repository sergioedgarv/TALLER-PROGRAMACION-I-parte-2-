<?= view('templates/header') ?>  
<link rel="stylesheet" href="<?= base_url('css/login.css') ?>">

<body>

<div class="auth-container" style="background-image: url('<?= base_url('img/7.jpg') ?>');">

  <div class="card-container" id="card">
    <!-- Login Form -->
    <div class="card-side card-front">
      <div class="form-box">
        <div class="brand-name">VAVI</div>
        <h2>Iniciar Sesión</h2>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        
        <form method="post" action="<?= base_url('login/authenticate') ?>">
          <input type="email" name="email" placeholder="Correo electrónico" required>
          <input type="password" name="password" placeholder="Contraseña" required>
          <button type="submit">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <button onclick="flipCard()">Regístrate</button></p>
      </div>
    </div>

    <!-- Register Form -->
    <div class="card-side card-back">
      <div class="form-box">
        <div class="brand-name">VAVI</div>
        <h2>Registrarse</h2>
        <form method="post" action="<?= base_url('register/save') ?>">
          <input type="text" name="nombre" placeholder="Nombre" required>
          <input type="text" name="apellido" placeholder="Apellido" required>
          <input type="email" name="email" placeholder="Correo electrónico" required>
          <input type="password" name="password" placeholder="Contraseña" required>
          <button type="submit">Crear cuenta</button>
        </form>
        <p>¿Ya tienes cuenta? <button onclick="flipCard()">Iniciar sesión</button></p>
      </div>
    </div>
  </div>

</div>

<script>
  function flipCard() {
    document.getElementById('card').classList.toggle('flipped');
  }
</script>

</body>

<?= view('templates/footer') ?>
