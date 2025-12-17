<?php
require_once __DIR__ . '/../backend/conexion.php';

$table = $_GET['table'] ?? 'alimentos';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $precio = (float)$_POST['precio'];
    $cantidad = (int)$_POST['cantidad'];
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    
    $sql = "INSERT INTO $table (nombre, precio, cantidad, descripcion) VALUES ('$nombre', $precio, $cantidad, '$descripcion')";
    $conn->query($sql);

    header('Location: index.php?table=' . urlencode($table));
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="../css/estilo_general.css">
</head>
<body>
    <nav class="top">
        <a class="brand" href="../public/index.php">TiendaDeBarrio</a>
    </nav>
    <main class="container">
        <h1>Registrar en <?php echo htmlspecialchars($table); ?></h1>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio Unitario</label>
                <input type="number" name="precio" id="precio" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad en Stock</label>
                <input type="number" name="cantidad" id="cantidad" value="1" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </div>

            <button type="submit" class="btn">Guardar Registro</button>
        </form>
    </main>
</body>
</html>
