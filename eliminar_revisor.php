<?php
include 'config.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $query = "DELETE FROM revisores WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    

    $eliminacion_exitosa = $stmt->execute();

  
    if ($eliminacion_exitosa) {
        echo 'success';
    } else {
  
        echo 'error: ' . $stmt->errorInfo()[2];
    }
} else {

    header("Location: dashboard_admin.php");
    exit();
}
?>
