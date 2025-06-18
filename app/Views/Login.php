  <?= view('templates/header') ?>  
  

<style>
  /*Estilos del login 
   A una etiqueta style de pegarme un tiro ¿PORQUE NO ANDAN LOS ENLANCES AAAAAA!!!!!!!!!
   perdon me altere.
  
  */


.card-container {
  width: 350px;
  height: 480px;
  perspective: 1000px;
  position: relative;
}

.card-side {
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
  position: absolute;
  backface-visibility: hidden;
  transition: transform 0.8s ease;
}

.card-front {
  z-index: 2;
  transform: rotateY(0deg);
}

.card-back {
  transform: rotateY(180deg);
}

.card-container.flipped .card-front {
  transform: rotateY(180deg);
}

.card-container.flipped .card-back {
  transform: rotateY(0deg);
  z-index: 2;
}

.form-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%;
}

.form-box h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.form-box input {
  margin-bottom: 15px;  
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #aaa;
}

.form-box button {
  background-color: #995FA3;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-box button:hover {
  background-color: #995FA3;
}

.brand-name {
  text-align: center;
  font-size: 28px;
  font-weight: 700;
  color: #0a0e2f; 
  margin-bottom: 8px;
  font-family: 'Poppins', sans-serif; /* si usás esta fuente */
  text-shadow:
    0 0 2px #2F1B25,
    0 0 4px #521945,
    0 0 6px #912F56 ,
    0 0 8px #BD2D87,
    0 0 10px #DB504A;



}
</style>


<body>

<div class="auth-container" style="background-image: url('<?= base_url('img/9.jpg') ?>'); background-size: cover; background-position: center; min-height: 90vh;">

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
<script src="<?= base_url('js/flip.js') ?>"></script>

</body>

<?= view('templates/footer') ?>
