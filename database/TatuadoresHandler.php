<!-- CREACIÓN DE LA TABLA DE TATUADORES -->

<?php
    // Cargamos la configuración de la base de datos
    require_once __DIR__ . '/../config/config.php'; 
    require_once 'DBHandler.php';

    // Creamos la conexión
    $db = new DBHandler(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    $conexion = $db->conectar();

    // Definimos la estructura de la tabla 'tatuadores' si no existe
    $sql = "CREATE TABLE IF NOT EXISTS tatuadores (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            foto VARCHAR(255),
            creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

    // Ejecutamos la creación de la tabla
    if ($conexion->query($sql) === TRUE) {
        echo "Tabla 'tatuadores' creada o ya existente.";
    } else {
        
        echo "Error al crear la tabla 'tatuadores': {$conexion->error}" ;
    }

    // Cerramos la conexión a la base de datos para liberar recursos
    $db->desconectar();
?>