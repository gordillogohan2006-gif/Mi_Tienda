<?php
require_once __DIR__ . '/conexion.php';
session_start();

$action = $_POST['action'] ?? '';

// Array de tablas válidas actualizado para incluir 'bebidas'
$valid_tables = ['alimentos', 'aseo', 'bebidas'];

if ($action === 'create') {
    $table = $_POST['table'] ?? '';
    $nombre = $conn->real_escape_string($_POST['nombre'] ?? '');
    $precio = (float)($_POST['precio'] ?? 0);
    $cantidad = (int)($_POST['cantidad'] ?? 0);
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    
    // VALIDACIÓN: Asegurar que la tabla sea una de las tres válidas
    if (!in_array($table, $valid_tables)) { 
        echo 'error: Tabla no válida'; 
        exit; 
    }
    
    $sql = "INSERT INTO $table (nombre, precio, cantidad, descripcion) VALUES ('$nombre',$precio,$cantidad,'$descripcion')";
    echo ($conn->query($sql)) ? 'ok' : 'error:'.$conn->error;
    exit;
}

if ($action === 'update') {
    $table = $_POST['table'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    $nombre = $conn->real_escape_string($_POST['nombre'] ?? '');
    $precio = (float)($_POST['precio'] ?? 0);
    $cantidad = (int)($_POST['cantidad'] ?? 0);
    $descripcion = $conn->real_escape_string($_POST['descripcion'] ?? '');
    
    // VALIDACIÓN: Asegurar que la tabla sea una de las tres válidas
    if (!in_array($table, $valid_tables)) { 
        echo 'error: Tabla no válida'; 
        exit; 
    }
    
    $sql = "UPDATE $table SET nombre='$nombre', precio=$precio, cantidad=$cantidad, descripcion='$descripcion' WHERE id=$id";
    echo ($conn->query($sql)) ? 'ok' : 'error:'.$conn->error;
    exit;
}

if ($action === 'delete') {
    $table = $_POST['table'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    
    // VALIDACIÓN: Asegurar que la tabla sea una de las tres válidas
    if (!in_array($table, $valid_tables)) { 
        echo 'error: Tabla no válida'; 
        exit; 
    }
    
    $sql = "DELETE FROM $table WHERE id=$id";
    echo ($conn->query($sql)) ? 'ok' : 'error:'.$conn->error;
    exit;
}

echo 'no action';
?>