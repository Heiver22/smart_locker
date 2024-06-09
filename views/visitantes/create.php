<?php
require_once '../../config/database.php';
require_once '../../models/Visitantes.php';

$pdo = require '../../config/database.php';
$model = new VisitantesModel($pdo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\vistas_visitantes\styles_visitantes_create.css">
    <script src="public/js/visitantes/create.js" defer></script>
    <title>Crear Visitante</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Crear Visitante</h1>
        <form id="createForm" class="mt-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear</button>
        </form>
    </div>
</body>
</html>
