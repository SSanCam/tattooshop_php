<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Enlace al archivo CSS para los estilos de la vista -->
    <link rel="stylesheet" href="../public/css/tatuadorStyles/styles_altaTatuador.css">
    
    <!-- BOOTSTRAP CSS para el diseño responsivo y estilización -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Alta de Tatuador</title>
</head>

<body>

    <main class="body__main">
        <!-- Formulario para registrar un nuevo tatuador -->
        <form class="main__form-plantilla <?= isset($errores) && !empty($errores) ? "main__form-plantilla-error" : "" ?>"
            action="/tattooshop_php/tatuadores/alta" method="post" enctype="multipart/form-data">
            
            <div class="form-plantilla__container">
                
                <!-- Campo: Nombre -->
                <div class="form-group">
                    <label class="fw-lighter text-lowercase text-white" for="input_nombre">Nombre</label>
                    <input type="text" class="shadow form-control" id="input_nombre" name="nombre"
                        placeholder="Introduce el nombre">
                    
                    <!-- Mostrar error si el campo está vacío -->
                    <?php if (!empty($errores) && isset($errores["error_nombre"])): ?>
                        <small id="nombreError" class="form-text text-danger fw-bold"><?= $errores["error_nombre"] ?></small>
                    <?php endif; ?>
                </div>

                <!-- Campo: Correo Electrónico -->
                <div class="form-group">
                    <label class="fw-lighter text-lowercase text-white" for="input_email">Correo Electrónico</label>
                    <input type="email" class="shadow form-control" id="input_email" name="email"
                        placeholder="Introduce el correo electrónico">
                    
                    <!-- Mostrar error si el email no es válido -->
                    <?php if (!empty($errores) && isset($errores["error_email"])): ?>
                        <small id="emailError" class="form-text text-danger fw-bold"><?= $errores["error_email"] ?></small>
                    <?php endif; ?>
                </div>

                <!-- Campo: Contraseña -->
                <div class="form-group">
                    <label class="fw-lighter text-lowercase text-white" for="input_password">Contraseña</label>
                    <input type="password" class="shadow form-control" id="input_password" name="password"
                        placeholder="Introduce una contraseña segura">
                    
                    <!-- Mostrar error si la contraseña está vacía -->
                    <?php if (!empty($errores) && isset($errores["error_password"])): ?>
                        <small id="passwordError" class="form-text text-danger fw-bold"><?= $errores["error_password"] ?></small>
                    <?php endif; ?>
                </div>

                <!-- Campo: Foto de Perfil (opcional) -->
                <div class="form-group">
                    <label class="fw-lighter text-lowercase text-white" for="input_foto">Foto de Perfil (opcional)</label>
                    <input type="file" class="shadow form-control" id="input_foto" name="foto" accept="image/*">
                    
                    <!-- Mostrar error si hubo problema con la imagen -->
                    <?php if (!empty($errores) && isset($errores["error_foto"])): ?>
                        <small id="fotoError" class="form-text text-danger fw-bold"><?= $errores["error_foto"] ?></small>
                    <?php endif; ?>
                </div>

                <!-- Botones de acción -->
                <div class="container__btns-form">
                    <button type="submit" class="btn btn-primary btns-form__btn-enviar">Registrar</button>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </form>

        <!-- Mensaje de error general en caso de fallo en la base de datos -->
        <?php if (!empty($errores) && isset($errores["error_db"])): ?>
            <p id="bdError" class="text-danger"><?= $errores["error_db"] ?></p>
        <?php endif; ?>
    </main>

    <!-- BOOTSTRAP JS para interactividad con botones y formularios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
