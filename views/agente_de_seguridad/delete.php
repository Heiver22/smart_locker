<?php
require_once '../../config/database.php';
require_once '../../models/AgenteDeSeguridad.php';

$pdo = require '../../config/database.php';
$model = new AgenteDeSeguridadModel($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/vistas_agente/styles_agente_delete.css">
    <title>Eliminar Agente de Seguridad</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Eliminar Agente de Seguridad</h1>
        <form id="deleteForm" class="mt-4">
            <div class="form-group">
                <label for="id">ID del Agente:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Eliminar</button>
        </form>
    </div>
    <script src="public/js/agente_de_seguridad/delete.js" defer></script>
</body>
</html>
