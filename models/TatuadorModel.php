<?php

require_once './database/DBHandler.php';

class TatuadorModel
{

    private $nombreTabla = "tatuadores"; // NOMBRE DE LA TABLA DE LA BASE DE DATOS
    private $conexion;              // ATRIBUTO QUE ALMACENARÁ LA CONEXIÓN A LA BASE DE DATOS
    private $database;             // ATRIBUTO QUE ALMACENA LA INSTANCIA DE DBHAndler

    public function __construct()
    {
        // Conectamos una sola vez al instanciar el modelo
        $this->database = new DBHandler("localhost","root","","tattooshop","3306");
        $this->conexion = $this->database->conectar();
    }

    // Método para insertar un nuevo tatuador en la base de datos
    public function insertTatuador($nombre, $email)
    {
        $sql = "INSERT INTO $this->nombreTabla (nombre, email) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", $nombre, $email);

        return $stmt->execute();
    }

    // Obtiene la info de un tatuador por su ID
    public function getTatuador($id)
    {
        $this->conexion = $this->database->conectar();

        $sql = "SELECT nombre, email, foto FROM tatuadores WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        // Devuelve un array asociativo con la info del tatuador
        return $resultado->fetch_assoc();
    }

    // Actualiza la información de un tatuador
    public function updateTatuador($id, $nombre, $email)
    {
        // Consulta para actualizar solo los campos permitidos
        $sql = "UPDATE $this->nombreTabla SET nombre = ?, email = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $email, $id);
        return $stmt->execute();
    }

    // Elimina un tatuador de la base de datos
    public function deleteTatuador($id)
    {
        $sql = "DELETE FROM $this->nombreTabla WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Obtiene una lista con todos los tatuadores (solo nombre y email)
    public function getAllTatuadores(): array
    {
        $sql = "SELECT id, nombre, email FROM $this->nombreTabla";
        $resultado = $this->conexion->query($sql);
        $tatuadores = [];

        while ($fila = $resultado->fetch_assoc()) {
            $tatuadores[] = $fila;
        }

        return $tatuadores;
    }

    public function cerrarConecxion()
    {
        $this->database->desconectar();
    }
}

?>