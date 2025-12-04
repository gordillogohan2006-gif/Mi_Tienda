<?php
require_once __DIR__ . '/../backend/conexion.php';
$table = $_GET['table'] ?? 'alimentos';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $cantidad = (int)$_POST['cantidad'];
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    $sql = "INSERT INTO $table (nombre, precio, cantidad, descripcion) VALUES ('$nombre',$precio,$cantidad,'$descripcion')";
    $conn->query($sql);
    
    // Redirigir a index.php manteniendo la tabla seleccionada
    header('Location: index.php?table=' . $table);
    exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Registrar</title><link rel="stylesheet" href="../css/estilo_general.css"></head><body>
<nav class="top"><a class="brand" href="../public/index.php">TiendaDeBarrio</a></nav>
<main class="container">
  <h1>Registrar en <?= htmlspecialchars($table) ?></h1>
  <form method="post">
    <label>Nombre</label><input name="nombre" required>
    <label>Precio</label><input name="precio" type="number" step="0.01" required>
    <label>Cantidad</label><input name="cantidad" type="number" value="1" required>
    <label>Descripción</label><textarea name="descripcion"></textarea>
    <button type="submit" class="btn">Guardar</button>
  </form>
</main></body></html>