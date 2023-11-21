<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: /ProyectoPograWeb/acceder.php"); // Si no está autenticado, redirigir a la página de acceso
    exit();
}

// Mostrar el nombre del usuario
$nombreUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ProyectoPograWeb/styles.css">
    <title>Bienvenida</title>
</head>
<body>

<!-- Jumbotron con imagen de fondo -->
<div class="jumbotron jumbotron-fluid bg-dark text-white">
    <div class="container text-center">
        <h1 class="display-4">Bienvenido a Prog Web</h1>
        <p class="lead">Equipo 1</p>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/ProyectoPograWeb/index.php">Prog Web</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <p>
                    <img src="/ProyectoPograWeb/img/usuario.png" alt="Pequeña Imagen" style="width: 70px; margin-right: 10px;">
                    <span style="color: white;">Bienvenido, <?php echo $nombreUsuario; ?></span>
                </p>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido de usuario.php 
<h1>Bienvenido, <?php echo $nombreUsuario; ?>!</h1>
-->

<div class="container">
    <img src="/ProyectoPograWeb/img/trabajo_equipo.jpg">
</div>


<!-- Footer con nombres de participantes -->
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p class="mb-0">
            Participantes:<br>
            Bernal Trejo Luis Fernando<br>
            De la Rosa Rosales Ian Xanthé<br>
            Díaz Gómez Alvaro<br>
            Lara de la Cruz Axel Rodrigo<br>
            Rodriguez Mendoza Jose Luis
        </p>
    </div>
</footer>

</body>
</html>
