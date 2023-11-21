<?php
include 'crud.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST["id"];
    $grado = $_POST["grado"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $cubiculo = $_POST["cubiculo"];

    if (updateRevisor($id, $grado, $nombres, $apellidos, $cubiculo)) {
   
    
        exit();
    } else {
        echo "Error al actualizar el revisor.";
    }
} else {
   
    header("Location: dashboard_admin.php");
    exit();
}
?>
