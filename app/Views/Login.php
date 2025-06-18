<?= view('templates/header') ?>

<!DOCTYPE html>
<html lang="es"

<head>
<style>


  body {
  font-family: 'Segoe UI', sans-serif;
  background: #f0f2f5;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-container {
  background: white;
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 350px;
  text-align: center;
}

.login-container h2 {
  margin-bottom: 1.5rem;
  color: #333;
}

.login-container form input {
  width: 100%;
  padding: 0.8rem;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  font-size: 1rem;
}

.login-container form button {
  width: 100%;
  padding: 0.8rem;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 0.5rem;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s;
}

.login-container form button:hover {
  background: #0056b3;
}

.divider {
  margin: 1rem 0;
  font-size: 0.9rem;
  color: #666;
}

.google-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  text-decoration: none;
  background: white;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  padding: 0.7rem;
  color: #333;
  transition: background 0.3s;
}

.google-btn:hover {
  background: #f5f5f5;
}

.google-btn img {
  width: 20px;
  height: 20px;
}

</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="tu_backend_login.php" method="POST">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="clave" placeholder="Contraseña" required>
      <button type="submit">Ingresar</button>
    </form>
    <div class="divider">o</div>
    <a href="tu_login_con_google.php" class="google-btn">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google" />
      Iniciar sesión con Google
    </a>
  </div>
</body>
</html>


<?= view('templates/footer') ?>