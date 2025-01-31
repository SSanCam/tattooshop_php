<?php
// Cargamos la configuración de la base de datos
require_once 'DBHandler.php';

// Creamos la conexión
$db = new DBHandler(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
$conexion = $db->conectar();

// Definimos la estructura de la tabla 'citas' si no existe
$sql = "CREATE TABLE IF NOT EXISTS citas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        descripcion TEXT NOT NULL,
        fechaCita DATETIME NOT NULL,
        cliente VARCHAR(100) NOT NULL,
        tatuador INT NOT NULL,
        FOREIGN KEY (tatuador) REFERENCES tatuadores(id) ON DELETE CASCADE
    )";

// Ejecutamos la creación de la tabla
if ($conexion->query($sql) === TRUE) {
    echo "Tabla 'citas' creada o ya existente.";
} else {
    echo "Error al crear la tabla 'citas': {$conexion->error}";
}

// Cerramos la conexión a la base de datos para liberar recursos
$db->desconectar();
?>
