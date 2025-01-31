<?php

require_once './database/DBHandler.php';
require_once __DIR__ . '/../config/config.php';

class TatuadorModel {

    private $dbHandler;
    private $conexion;

    public function __construct() {
        // Conectamos con la base de datos usando los datos de config.php
        $this->dbHandler = new DBHandler(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    }

    // Método para insertar un nuevo tatuador en la base de datos
    public function createTatuador(string $nombre, string $email, string $password, ?string $foto): bool {
        $foto = $foto ?? 'default.jpg'; // Foto predeterminada si es NULL

        $this->conexion = $this->dbHandler->conectar();

        $sql = "INSERT INTO tatuadores (nombre, email, password, foto) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $email, $password, $foto);
            $resultado = $stmt->execute();
            $stmt->close();
            $this->dbHandler->desconectar();
            return $resultado;
        }

        $this->dbHandler->desconectar();
        return false;
    }

    // Obtiene la info de un tatuador por su ID
    public function getTatuador($id) {
        $this->conexion = $this->dbHandler->conectar();

        $sql = "SELECT * FROM tatuadores WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();

        $this->dbHandler->desconectar();

        return $resultado->fetch_assoc(); // Devuelve un array asociativo con la info del tatuador
    }

    // Actualiza la información de un tatuador
    public function updateTatuador($id, $nombre, $email, $password, $foto): bool {
        $this->conexion = $this->dbHandler->conectar();

        $sql = "UPDATE tatuadores SET nombre = ?, email = ?, password = ?, foto = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssi", $nombre, $email, $password, $foto, $id);
            $resultado = $stmt->execute();
            $stmt->close();
            $this->dbHandler->desconectar();
            return $resultado;
        }

        $this->dbHandler->desconectar();
        return false;
    }

    // Elimina un tatuador de la base de datos
    public function deleteTatuador($id): bool {
        $this->conexion = $this->dbHandler->conectar();

        $sql = "DELETE FROM tatuadores 
                WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $resultado = $stmt->execute();
            $stmt->close();
            $this->dbHandler->desconectar();
            return $resultado;
        }

        $this->dbHandler->desconectar();
        return false;
    }

    // Obtiene una lista con todos los tatuadores
    public function getAllTatuadores(): array {
        $this->conexion = $this->dbHandler->conectar();

        $sql = "SELECT nombre, email 
                FROM tatuadores";
        $resultado = $this->conexion->query($sql);

        $tatuadores = [];
        while ($fila = $resultado->fetch_assoc()) {
            $tatuadores[] = $fila;
        }

        $this->dbHandler->desconectar();
        return $tatuadores;
    }
}
?>
