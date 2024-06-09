<?php
require_once '../../config/database.php';
require_once '../../models/Propietarios.php';

$pdo = require '../../config/database.php';
$model = new PropietariosModel($pdo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/vistas_propietarios/styles_propietarios_delete.css">
    <script src="public/js/propietarios/delete.js" defer></script>
    <title>Eliminar Propietario</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Eliminar Propietario</h1>
        <form id="deleteForm" class="mt-4">
            <div class="form-group">
                <label for="id">ID del Propietario:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Eliminar</button>
        </form>
    </div>
</body>
</html>
