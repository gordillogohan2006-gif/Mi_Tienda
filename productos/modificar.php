<?php
require_once __DIR__ . '/../backend/conexion.php';
$table = $_GET['table'] ?? 'alimentos';
$id = (int)($_GET['id'] ?? 0);
if ($id<=0) { 
    // Redirigir si no hay ID, manteniendo la tabla
    header('Location: index.php?table=' . $table); 
    exit; 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $cantidad = (int)$_POST['cantidad'];
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    $conn->query("UPDATE $table SET nombre='$nombre', precio=$precio, cantidad=$cantidad, descripcion='$descripcion' WHERE id=$id");
    
    // Redirigir a index.php con la tabla seleccionada
    header('Location: index.php?table=' . $table); 
    exit;
}
$row = $conn->query("SELECT * FROM $table WHERE id=$id")->fetch_assoc();
?>
<!doctype html><html><head><meta charset="utf-8"><title>Modificar</title><link rel="stylesheet" href="../css/estilo_general.css"></head><body>
<nav class="top"><a class="brand" href="../public/index.php">TiendaDeBarrio</a></nav>
<main class="container">
  <h1>Modificar <?= htmlspecialchars($table) ?></h1>
  <form method="post">
    <label>Nombre</label><input name="nombre" value="<?= htmlspecialchars($row['nombre']) ?>" required>
    <label>Precio</label><input name="precio" type="number" step="0.01" value="<?= htmlspecialchars($row['precio']) ?>" required>
    <label>Cantidad</label><input name="cantidad" type="number" value="<?= htmlspecialchars($row['cantidad']) ?>" required>
    <label>Descripción</label><textarea name="descripcion"><?= htmlspecialchars($row['descripcion']) ?></textarea>
    <button type="submit" class="btn">Actualizar</button>
  </form>
</main></body></html>