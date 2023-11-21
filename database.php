<?php

class Database {
    private $host = "localhost";
    private $usuario = "pame";
    private $contrasena = "123456";
    private $base_de_datos = "usuweb";
    private $conexion;


    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->base_de_datos}", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "Error de conexión: " . $ex->getMessage();
        }
    }

    public function obtenerNombreAdmin() {
        try {
            
            $query = "SELECT Nombres,Rol FROM usuarios WHERE Rol = 'admin' LIMIT 1";
            $stmt = $this->conexion->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            } else {
                return "Admin no encontrado";
            }
        } catch (PDOException $ex) {
            echo "Error al obtener el nombre del administrador: " . $ex->getMessage();
        }
    }
}

?>
