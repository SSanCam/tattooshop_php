<?php

require_once "./models/TatuadorModel.php";

class TatuadorController
{
    // Accede al modelo de tatuadores
    private $tatuadorModel;

    // Se inicializa el modelo
    public function __construct()
    {
        $this->tatuadorModel = new TatuadorModel();
    }

    // Método para llamar a la vista de alta de tatuador
    public function showAltaTatuador($errores = [])
    {
        require_once "./views/tatuadorViews/TatuadorAltaView.php";
    }

    // Método para insertar un nuevo tatuador en la base de datos
    public function insertTatuador($datos = [])
    {
        // Se almacenan los datos del formulario
        $nombre = trim($datos["nombre"] ?? "");
        $email = trim($datos["email"] ?? "");
        $password = trim($datos["password"] ?? "");
        $foto = $_FILES["foto"] ?? null;

        // Se comprueba si los datos del formulario son correctos
        $errores = [];

        if ($nombre == "") {
            $errores["error_nombre"] = "El nombre es obligatorio.";
        }

        if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores["error_email"] = "El email debe ser válido.";
        }

        if ($password == "") {
            $errores["error_password"] = "La contraseña es obligatoria.";
        }

        // **Si no se subió una imagen, asignar la predeterminada**
        if ($foto === null) {
            $foto = "../public/images/perfil.jpeg";
        }

        // Si hay errores se muestra el mensaje de error
        if (!empty($errores)) {
            $this->showAltaTatuador($errores);
            return;
        }

        // **Encriptamos la contraseña antes de insertar en la BD**
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insertamos en la base de datos
        $resultado = $this->tatuadorModel->insertTatuador($nombre, $email);

        // **Si la operación es exitosa, mostramos la vista de éxito**
        if ($resultado) {
            require_once "./views/tatuadorViews/TatuadorAltaCorrectaView.php";
        } else {
            $errores["error_general"] = "Error al registrar el tatuador.";
            $this->showAltaTatuador($errores);
        }
    }
}
?>
