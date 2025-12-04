<?php
session_start();
require_once __DIR__ . '/conexion.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? 'user';

if ($email === '' || $password === '') {
    header('Location: ../public/login.php?error=empty');
    exit;
}

$stmt = $conn->prepare("SELECT id, nombre, email, password, rol FROM usuarios WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();

if ($user = $res->fetch_assoc()) {
    // NOTE: passwords are plain-text for the demo; in production use password_hash()
    if ($password === $user['password'] || $password === $user['clave'] ) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['nombre'] ?? $user['username'] ?? $user['usuario'] ?? $user['email'];
        $_SESSION['role'] = $user['rol'] ?? $user['role'] ?? 'user';
        if ($_SESSION['role'] === 'admin' || $_POST['role']==='admin') {
            header('Location: ../admin/admin_crud.php');
            exit;
        } else {
            header('Location: ../public/dashboard.php');
            exit;
        }
    }
}

header('Location: ../public/login.php?error=invalid');
exit;
?>