<?php
// public/registro.php
require_once __DIR__ . '/../backend/conexion.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = $_POST['role'] === 'admin' ? 'admin' : 'user';
    
    // Verificar si el correo ya existe
    $check_stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        $msg = "Error: El correo electrónico ya está registrado.";
    } else {
        // Proceder con la inserción si el correo no existe
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre,email,password,rol) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$nombre,$email,$password,$role);
        if ($stmt->execute()) { 
            $msg = "Registrado exitosamente. Ahora puedes iniciar sesión."; 
        } else { 
            $msg = "Error al registrar: " . $conn->error; 
        }
    }
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Registro</title><link rel="stylesheet" href="../css/estilo_login.css"></head><body>
<nav class="top"><a class="brand" href="index.php">TiendaDeBarrio</a><div class="menu"><a href="index.php">Inicio</a><a href="../productos/index.php">Productos</a></div></nav>
<main class="container">
<div class="form-box">
  <h2>Registro</h2>
  <?php if ($msg) echo "<p style='text-align:center; color:".(strpos($msg, 'Error') !== false ? 'red' : '#4CAF50')."'>".$msg."</p>"; ?>
  
  <form method="post">
    <div class="form-field"><label>Nombre</label><input name="nombre" required></div>
    <div class="form-field"><label>Correo</label><input name="email" type="email" required></div>
    <div class="form-field"><label>Contraseña</label><input name="password" type="password" required></div>
    
    <div class="form-field">
      <label>Tipo de Cuenta</label>
      <select name="role">
        <option value="user">Usuario (Cliente)</option>
        <option value="admin">Administrador</option>
      </select>
    </div>
    
    <div class="row-btns" style="display:flex; justify-content:space-between; margin-top: 20px;">
      <button type="submit" class="btn-main">Registrar</button>
      <a href="login.php" class="btn-link">¿Ya tienes cuenta? Inicia Sesión.</a>
    </div>
  </form>
</div>
</main></body></html>