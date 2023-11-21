<?php
require_once 'Database.php'; // Ajusta la ruta según la ubicación de tu archivo Database.php

// Crear una instancia de la clase Database
$database = new Database();

// Verificar si el driver 'mysql' está disponible
if ($database->verificaDriver()) {
    // Obtener la conexión a la base de datos
    $pdo = $database->getConnection();

    // Ahora puedes utilizar $pdo para realizar consultas y otras operaciones en la base de datos
} else {
    die("El driver 'mysql' no está disponible en este entorno.");
}

// Iniciar o reanudar una sesión
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginForm'])) {
        // Procesar formulario de inicio de sesión
        // ...
    } elseif (isset($_POST['registerForm'])) {
        // Procesar formulario de registro
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $login = $_POST['login'];
        $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol = $_POST['rol'];

        // Verificar si el usuario ya existe
        $stmt = $pdo->prepare("SELECT ID FROM usuarios WHERE login = ?");
        $stmt->execute([$login]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
        } else {
            // Insertar nuevo usuario en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuarios (Nombres, Apellidos, login, pwd, rol) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nombres, $apellidos, $login, $pwd, $rol]);
            echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Tu Proyecto</title>
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
        <a class="navbar-brand" href="index.php">Prog Web</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="acceder.php">
                    <button id="btnAcceder" class="btn btn-dark">Acceder</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">
                    <button id="btnRegistrarse" class="btn btn-primary">Registrarse</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<div class="container">
    <img src="/img/trabajo_equipo.jpg">
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
