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
    <link rel="stylesheet" href="public\css\vistas_visitantes\styles_visitantes_delete.css">
    <script src="public/js/visitantes/delete.js" defer></script>
    <title>Eliminar Visitante</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Eliminar Visitante</h1>
        <form id="deleteForm" class="mt-4">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Eliminar</button>
        </form>
    </div>
</body>
</html>
