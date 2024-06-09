<?php
require_once '../../config/database.php';
require_once '../../models/TipoPaquete.php';

$pdo = require '../../config/database.php';
$model = new TipoPaqueteModel($pdo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\vistas_tipo_paquete\styles_tipo_paquete_create.css">
    <script src="public/js/tipo_paquete/create.js" defer></script>
    <title>Crear Tipo de Paquete</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Crear Tipo de Paquete</h1>
        <form id="createForm" class="mt-4">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear</button>
        </form>
    </div>
</body>
</html>
