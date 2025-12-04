<?php
// productos/index.php (Implementa la tabla dinámica y el selector)

require_once __DIR__ . '/../backend/conexion.php';
session_start();

// --- Lógica de Categorías ---
$categorias = [
    'alimentos' => 'Alimentos',
    'aseo' => 'Aseo',
    'bebidas' => 'Bebidas' // Nueva categoría
];

// Obtener la categoría seleccionada de la URL (por defecto 'alimentos')
$categoria_actual = $_GET['table'] ?? 'alimentos';

// Validación de categoría (seguridad)
if (!array_key_exists($categoria_actual, $categorias)) {
    $categoria_actual = 'alimentos';
}

$nombre_categoria = $categorias[$categoria_actual];
// Consulta SQL dinámica
$sql_query = "SELECT * FROM " . $conn->real_escape_string($categoria_actual);
$res = $conn->query($sql_query);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $nombre_categoria ?> | Productos</title>
    <link rel="stylesheet" href="../css/estilo_general.css">
    <style>
        /* Estilos para el selector de categorías */
        .category-selector {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
        .category-selector a {
            padding: 10px 15px;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            background-color: #f9f9f9;
        }
        /* Resaltar el botón activo */
        .category-selector a.active {
            background-color: #4CAF50;
            color: white;
            border-color: #4CAF50;
        }
    </style>
</head>
<body>
<nav class="top">
    <a class="brand" href="../public/index.php">TiendaDeBarrio</a>
    <div class="menu">
        <a href="../public/index.php">Inicio</a>
        <a href="index.php">Productos</a>
        <a href="../public/login.php">Login</a>
    </div>
</nav>
<main class="container">
    <h1>Gestión de <?= $nombre_categoria ?></h1>

    <div class="category-selector">
        <h3>Ver:</h3>
        <?php foreach ($categorias as $key => $name): ?>
            <a href="index.php?table=<?= $key ?>" class="<?= $key === $categoria_actual ? 'active' : '' ?>">
                <?= $name ?>
            </a>
        <?php endforeach; ?>
    </div>

    <a class="btn" href="registrar.php?table=<?= $categoria_actual ?>">Registrar producto de <?= $categoria_actual ?></a>

    <table>
        <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Acciones</th></tr>
        <?php if ($res): ?>
            <?php while($r = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= htmlspecialchars($r['nombre']) ?></td>
                <td><?= $r['precio'] ?></td>
                <td><?= $r['cantidad'] ?></td>
                <td>
                    <a href="modificar.php?table=<?= $categoria_actual ?>&id=<?= $r['id'] ?>">Editar</a> | 
                    <a href="eliminar.php?table=<?= $categoria_actual ?>&id=<?= $r['id'] ?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Error al cargar los datos o no hay productos en esta categoría.</td>
            </tr>
        <?php endif; ?>
    </table>
</main>
</body>
</html>