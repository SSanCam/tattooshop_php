<?php

require_once __DIR__ . '/../database/DBHandler.php';

class TatuadorModel {

    private $dbHandler;
    private $conexion;

    public function __construct() {
        // Conectamos una sola vez al instanciar el modelo
        $this->dbHandler = new DBHandler(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        $this->conexion = $this->dbHandler->conectar();
    }
    public function __destruct() {
        // Cerramos la conexión al destruir el objeto
        $this->dbHandler->desconectar();
    }
    // Método para insertar un nuevo tatuador en la base de datos
    public function insertTatuador(string $nombre, string $email, string $password, ?string $foto): bool {
        $foto = $foto ?? '../public/images/perfil.jpeg'; // Foto predeterminada si es NULL
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tatuadores (nombre, email, password, foto) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $email, $hashedPassword, $foto);
            $resultado = $stmt->execute();
            $stmt->close();
            $this->dbHandler->desconectar();
            return $resultado;
        }
        return false;
    }

    // Obtiene la info de un tatuador por su ID
    public function getTatuador($id) {

        $sql = "SELECT nombre, email, foto FROM tatuadores WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();

        return $resultado->fetch_assoc(); // Devuelve un array asociativo con la info del tatuador
    }

    // Actualiza la información de un tatuador
    public function updateTatuador($id, $nombre, $email, $password, $foto): bool {

        // Consulta para actualizar solo los campos permitidos
        $sql = "UPDATE tatuadores SET nombre = ?, email = ?, password = ?, foto = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssi", $nombre, $email, $password, $foto, $id);
            $resultado = $stmt->execute();
            $stmt->close();
            $this->dbHandler->desconectar();
            return $resultado;
        }
        return false;
    }

    // Elimina un tatuador de la base de datos
    public function deleteTatuador($id): bool {

        $sql = "DELETE FROM tatuadores WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $resultado = $stmt->execute();
            $stmt->close();
            return $resultado;
        }
        return false;
    }

    // Obtiene una lista con todos los tatuadores (solo nombre y email)
    public function getAllTatuadores(): array {

        $sql = "SELECT nombre, email, foto FROM tatuadores";
        $resultado = $this->conexion->query($sql);

        $tatuadores = [];
        while ($fila = $resultado->fetch_assoc()) {
            $tatuadores[] = $fila;
        }
        return $tatuadores;
    }

}
?>
