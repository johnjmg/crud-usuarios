<?php
// Incluye el controlador
include_once "controller/editar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST" action="controller/editar.php">
        <h3 class="py-3">Editar usuario</h3>
        <input type="hidden" name="id" value="<?= htmlspecialchars($persona->id) ?>">
                
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($persona->nombre) ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($persona->apellido) ?>">
        </div>
        <div class="mb-3">
            <label for="cc" class="form-label">Número de identificación</label>
            <input type="number" class="form-control" name="cc" value="<?= htmlspecialchars($persona->cc) ?>">
        </div>
        <div class="mb-3">
            <label for="fecha-nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha-nacimiento" value="<?= htmlspecialchars($persona->fecha_nac) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($persona->email) ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="btneditar" value="ok">Editar</button>
    </form>
</body>
</html>
