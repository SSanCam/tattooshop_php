<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/citasStyles/styles_altaCorrecta.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>AltaCorrecta</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h2>¡Cita registrada con éxito! 🎉</h2>
        </div>

        <div class="card mx-auto shadow-lg p-4" style="max-width: 500px;">
            <h4 class="text-center mb-3">Detalles de la Cita</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Fecha:</strong> <?= htmlspecialchars($fecha_cita_formatted) ?>
                </li>
                <li class="list-group-item"><strong>Descripción:</strong> <?= htmlspecialchars($input_descripcion) ?>
                </li>
                <li class="list-group-item"><strong>Cliente:</strong> <?= htmlspecialchars($input_cliente) ?></li>
                <li class="list-group-item"><strong>Tatuador:</strong>
                    <?= htmlspecialchars($tatuadorInfo["nombre"]) ?></li>
                <li class="list-group-item"><strong>Email Tatuador:</strong>
                    <?= htmlspecialchars($tatuadorInfo["email"]) ?></li>
                <li class="list-group-item text-center">
                    <img src="<?= htmlspecialchars($tatuadorInfo["foto"]) ?>" alt="Foto del tatuador"
                        class="img-thumbnail" width="150">
                </li>
            </ul>
        </div>

        <div class="text-center mt-4">
            <a href="/tattooshop_php/citas/alta" class="btn btn-primary">📅 Agendar otra cita</a>
            <a href="/tattooshop_php" class="btn btn-secondary">🏠 Volver al inicio</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>