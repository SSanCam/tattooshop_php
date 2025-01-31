<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Enlace a la hoja de estilos específica para esta vista -->
    <link rel="stylesheet" href="../public/css/tatuadorStyles/styles_altaCorrecta.css">

    <!-- BOOTSTRAP CSS para el diseño responsivo y estilización -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Registro Exitoso</title>
</head>

<body class="bg-light"> <!-- Fondo claro para mejorar el contraste -->

    <!-- Contenedor principal con margen superior -->
    <div class="container mt-5">
        
        <!-- Mensaje de éxito con estilo Bootstrap -->
        <div class="alert alert-success text-center" role="alert">
            <h1>¡Alta de Tatuador Exitosa! ✅</h1>
            <p>El tatuador ha sido registrado correctamente en la base de datos.</p>
            
            <!-- Botón para registrar otro tatuador -->
            <a href="/tattooshop_php/tatuadores/alta" class="btn btn-primary">Registrar otro tatuador</a>
            
            <!-- Botón para volver al inicio -->
            <a href="/tattooshop_php/" class="btn btn-secondary">Volver al inicio</a>
        </div>

    </div>

    <!-- BOOTSTRAP JS para la funcionalidad interactiva de los botones -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
