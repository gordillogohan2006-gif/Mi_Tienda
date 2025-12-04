<?php
require_once __DIR__ . '/conexion.php';
header('Content-Type: application/json; charset=utf-8');

$category = $_GET['category'] ?? '';
$out = [];
$valid_tables = ['alimentos', 'aseo', 'bebidas'];

if (in_array($category, $valid_tables)) {
    // Si se especifica una categoría válida, obtener solo esa
    $table = $conn->real_escape_string($category);
    $res = $conn->query("SELECT * FROM $table ORDER BY id DESC");
    if ($res) {
        while($r = $res->fetch_assoc()) $out[] = $r;
    }
} else {
    // Si no se especifica categoría, retornar todas usando UNION
    $sql_union = 
        "SELECT 'alimentos' as category, id, nombre, precio, cantidad, descripcion FROM alimentos
        UNION ALL
        SELECT 'aseo' as category, id, nombre, precio, cantidad, descripcion FROM aseo
        UNION ALL
        SELECT 'bebidas' as category, id, nombre, precio, cantidad, descripcion FROM bebidas
        ORDER BY category, id DESC";
    
    $res = $conn->query($sql_union);
    if ($res) {
        while($r = $res->fetch_assoc()) $out[] = $r;
    }
}

echo json_encode($out);
?>