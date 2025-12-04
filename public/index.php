<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Barrio Moderna</title>
    <link rel="stylesheet" href="../css/estilo_index.css"> 
</head>
<body>

    <nav class="navbar">
        <h2 class="logo">Tienda de Barrio Moderna </h2>
        <div class="links">
            <a href="index.php">Inicio</a>
            <a href="../productos/index.php">Productos</a>
            <a href="login.php">Login</a>
        </div>
    </nav>

    <section class="main-container">

        <h1>Bienvenido a la Tienda de Barrio Moderna</h1>
        <p class="desc">
            Somos tu proveedor de confianza con un inventario completo y moderno. Con nuestro nuevo sistema de gestión, puedes revisar y administrar todas las categorías de forma rápida.
        </p>
        
        <div class="login-cta" style="margin-bottom: 20px;">
            <p>¿Eres un administrador o deseas registrarte?</p>
            <a class="btn" href="login.php">Iniciar Sesión / Registrarse</a>
        </div>
        
        <hr>

        <h2>Nuestras Áreas de Servicio y Calidad</h2>

        <div class="category-section">
            <h3>Alimentos: Calidad Nacional e Internacional</h3>
            <p>Nuestra selección de alimentos va más allá de lo local. Contamos con productos básicos y gourmet vendidos a **nivel nacional e internacional**, asegurando siempre la máxima frescura y cumpliendo con todos los estándares de calidad.</p>
            <p>Encuentra aquí desde frutas y verduras frescas hasta abarrotes esenciales. ¡La mejor variedad para tu mesa!</p>
            <a class="btn" href="../productos/index.php?table=alimentos">Ver y Administrar Alimentos</a>
        </div>
        
        <hr>

        <div class="category-section">
            <h3>Aseo: Cuidado Integral para tu Hogar</h3>
            <p>Ofrecemos las soluciones más efectivas para el mantenimiento de tu hogar y el cuidado personal. Desde detergentes potentes hasta productos de higiene, todo de marcas líderes.</p>
            <p>Tu bienestar y la limpieza son nuestra prioridad. Explora nuestra amplia gama de productos de aseo, siempre al mejor precio.</p>
            <a class="btn" href="../productos/index.php?table=aseo">Ver y Administrar Aseo</a>
        </div>
        
        <hr>

        <div class="category-section">
            <h3>Bebidas: Inventario Frío y Variado</h3>
            <p>La categoría más refrescante que incluye aguas, jugos naturales, gaseosas populares y bebidas energéticas. ¡Tenemos las 10 mejores bebidas que tu comunidad necesita, con stock siempre listo!</p>
            <p>Perfectas para cualquier momento del día. Revisa nuestra sección y actualiza el inventario fácilmente.</p>
            <a class="btn" href="../productos/index.php?table=bebidas">Ver y Administrar Bebidas</a>
        </div>
        
        <hr>

        <section class="final-cta">
            <h2>Gestión Unificada</h2>
            <p>Recuerda que todas las categorías (Alimentos, Aseo, Bebidas) se administran desde una **sola vista de tabla dinámica**, con el selector de categorías en la parte superior. Esto simplifica tu trabajo diario.</p>
            <a class="btn" href="../productos/index.php">Ir a la Vista de Productos</a>
        </section>

    </section>

    <footer>
        <p>&copy; 2025 Tienda de Barrio Moderna. Todos los derechos reservados.</p>
    </footer>

</body>
</html>