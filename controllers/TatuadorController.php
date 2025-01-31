<?php

require_once "./models/TatuadorModel.php";

class TatuadorConroller
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
    public function createTatuador($datos)
    {
        // Se almacenan los datos del formulario
        $nombre = trim($datos["nombre"] ?? "");
        $email = trim($datos["email"] ?? "");
        $password = trim($datos["password"] ?? "");
        $foto = null;

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

        // **Manejo de la imagen dentro de $datos**
        if (isset($datos["foto"]) && $datos["foto"]["error"] === UPLOAD_ERR_OK) {
            $urlImage = time() . "_" . basename($datos["foto"]["name"]);
            $rutaDestino = "./public/images/tatuadores/" . $urlImage;

            if (move_uploaded_file($datos["foto"]["tmp_name"], $rutaDestino)) {
                $foto = $rutaDestino;
            } else {
                $errores["error_foto"] = "Error al subir la imagen.";
            }
        }

        // **Si no se subió una imagen, asignar la predeterminada**
        if ($foto === null) {
            $foto = "../public/images/perfil.jpeg";
        }

        // Si hay errores se muestra el mensaje de error
        if (!empty($errores)) {
            $this->showAltaTatuador($errores);
            return;
        } else {
            $operacionExitosa = $this->tatuadorModel-> insertTatuador($nombre, $email, $password, $foto);

        }

    }







}
?>