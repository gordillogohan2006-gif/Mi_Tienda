<?php
require_once __DIR__ . '/../backend/conexion.php';
$table = $_GET['table'] ?? 'alimentos';
$id = (int)($_GET['id'] ?? 0);
if ($id>0) $conn->query("DELETE FROM $table WHERE id=$id");

// Redirigir a index.php con la tabla seleccionada
header('Location: index.php?table=' . $table);
exit;
?>