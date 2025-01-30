<!-- CREACIÓN DE LA TABLA DE TATUADORES -->

<?php 
    // Cargamos el manejo de la base de datos
    require_once 'DBHandler.php';

    // Configuración de los datos de conexión
    $hostname = "localhost";
    $usuario = "root";
    $contrasena = "root"; 
    $base_de_datos = "tattooshop";
    $port = 3306;

    // Creamos la conexión
    $db = new DBHandler($hostname, $usuario, $contrasena, $base_de_datos, $port);
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
        echo "Error al crear la tabla 'tatuadores': " . $conexion->error;
    }

    // Cerramos la conexión a la base de datos para liberar recursos
    $db->desconectar();
?>
