<?php
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginForm'])) {
    // Recuperar datos del formulario
    $username = $_POST['login'];
    $password = $_POST['password'];

    // Validar el inicio de sesión en la base de datos (ajusta según tu estructura de la base de datos)
    require_once '/ProyectoPograWeb/Database.php';

    $database = new Database();

    if ($database->verificaDriver()) {
        $pdo = $database->getConnection();
    } else {
        die("El driver 'mysql' no está disponible en este entorno.");
    }

    // Consultar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['pwd'])) {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $user['Nombres']; // Guardar el nombre del usuario en la sesión
        header("Location: /ProyectoPograWeb/usuario.php"); // Redireccionar a usuario.php
        exit();
    } else {
        // Error de inicio de sesión
        echo "Nombre de usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}
?>
