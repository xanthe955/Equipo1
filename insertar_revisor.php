<?php
include 'crud.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $grado = $_POST['grado'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cubiculo = $_POST['cubiculo'];

    // Llamada a la función para agregar el revisor
    $result = addRevisor($grado, $nombres, $apellidos, $cubiculo);

   
    if ($result) {
       
        header("Location: dashboard_admin.php");
        exit();
    } else {
        // Muestra un mensaje de error si la inserción falla
        echo 'Error al agregar revisor: ' . $stmt->errorInfo()[2];
    }
} else {
    // Si no se realizó una solicitud POST, redirige a la página de inicio
    header("Location: dashboard_admin.php");
    exit();
}
?>
