<?php
session_start();
require_once __DIR__ . '/../backend/conexion.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/login.php');
    exit;
}
// Verificar si es administrador antes de mostrar el panel
if (($_SESSION['role'] ?? 'user') !== 'admin') {
    // Si no es admin, redirigir al dashboard normal o al inicio
    header('Location: ../public/index.php'); 
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel Admin - TiendaDeBarrio</title>
<link rel="stylesheet" href="../css/estilo_general.css"> 
<link rel="stylesheet" href="../css/estilo_admin.css">
</head>
<body>
<nav class="top">
  <a class="brand" href="../public/index.php">TiendaDeBarrio</a>
  <div class="menu">
    <a href="admin_crud.php">Dashboard</a>
    <a href="../backend/logout.php">Cerrar Sesión</a>
  </div>
</nav>
<main class="container">
  <header class="admin-header">
    <h1>Panel de Administración</h1>
    <p class="subtitle">Bienvenido, **<?= htmlspecialchars($_SESSION['username'] ?? 'Administrador') ?>**. Gestiona el inventario, usuarios y ventas desde aquí.</p>
  </header>

  <hr>

  <section class="dashboard-grid">
    
    <div class="card card-alimentos">
        <h3>Administrar Alimentos</h3>
        <p>Añade, edita y elimina productos comestibles.</p>
        <a class="btn btn-primary" href="../productos/index.php?table=alimentos">Ir a Gestión</a>
    </div>

    <div class="card card-aseo">
        <h3>Administrar Aseo</h3>
        <p>Controla el stock y precios de artículos de limpieza y cuidado personal.</p>
        <a class="btn btn-primary" href="../productos/index.php?table=aseo">Ir a Gestión</a>
    </div>
    
    <div class="card card-bebidas">
        <h3>Administrar Bebidas</h3>
        <p>Gestiona la nueva sección de bebidas y sus 10 productos.</p>
        <a class="btn btn-primary" href="../productos/index.php?table=bebidas">Ir a Gestión</a>
    </div>

    <div class="card card-usuarios">
        <h3>Gestión de Usuarios</h3>
        <p>Revisa y modifica los roles y datos de los usuarios registrados.</p>
        <a class="btn btn-secondary" href="#">Próximamente...</a>
    </div>

  </section>
  
</main>
</body>
</html>