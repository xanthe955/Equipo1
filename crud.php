<?php
include 'config.php';

function getRevisores() {
    global $conn;
    $query = "SELECT * FROM revisores";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addRevisor($grado, $nombres, $apellidos, $cubiculo) {
    global $conn;
    $query = "INSERT INTO revisores (grado_academico, nombres, apellidos, cubiculo) VALUES (:grado, :nombres, :apellidos, :cubiculo)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':grado', $grado);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':cubiculo', $cubiculo);
    return $stmt->execute();
}

function updateRevisor($id, $grado, $nombres, $apellidos, $cubiculo) {
    global $conn;
    $query = "UPDATE revisores SET grado_academico = :grado, nombres = :nombres, apellidos = :apellidos, cubiculo = :cubiculo WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':grado', $grado);
    $stmt->bindParam(':nombres', $nombres);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':cubiculo', $cubiculo);
    return $stmt->execute();
}

function deleteRevisor($id) {
    global $conn;
    $query = "DELETE FROM revisores WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}


function getRevisorById($id) {
    global $conn;
    $query = "SELECT * FROM revisores WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function eliminarRevisor($id) {
    global $conn;
    $query = "DELETE FROM revisores WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}


?>
