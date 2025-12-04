<?php
// public/login.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Login - TiendaDeBarrio</title>
<link rel="stylesheet" href="../css/estilo_general.css">
</head>
<body>
<nav class="top">
  <a class="brand" href="index.php">TiendaDeBarrio</a>
  <div class="menu">
    <a href="index.php">Inicio</a>
    <a href="../productos/index.php">Productos</a>
  </div>
</nav>
<main class="container">
  <div class="form-box">
    <h2>Iniciar sesión</h2>
    
    <?php
    // Mostrar mensajes de error si existen
    if (isset($_GET['error'])) {
        $error = htmlspecialchars($_GET['error']);
        if ($error === 'empty') {
            echo '<p style="color:red; text-align:center;">Por favor, llena todos los campos.</p>';
        } elseif ($error === 'invalid') {
            echo '<p style="color:red; text-align:center;">Credenciales inválidas.</p>';
        }
    }
    ?>

    <form action="../backend/validar_login.php" method="POST">
      <div class="form-field">
        <label for="role">Tipo de cuenta</label>
        <select id="role" name="role">
          <option value="user">Usuario</option>
          <option value="admin">Administrador</option>
        </select>
      </div>
      <div class="form-field">
        <label for="email">Correo electrónico</label>
        <input id="email" name="email" type="email" placeholder="Email" required>
      </div>
      <div class="form-field">
        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" placeholder="Password" required>
      </div>
      
      <div class="row-btns" style="display:flex; justify-content:space-between; margin-top: 20px;">
        <button type="submit" class="btn-main">Ingresar</button>
        <a href="registro.php" class="btn-link">¿No tienes cuenta? Regístrate aquí.</a>
      </div>
    </form>
  </div>
</main>
</body>
</html>