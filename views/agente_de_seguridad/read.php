<?php
require_once '../../config/database.php';
require_once '../../models/AgenteDeSeguridad.php';

$pdo = require '../../config/database.php';
$model = new AgenteDeSeguridadModel($pdo);

$agentes = $model->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/vistas_agente/styles_agente_read.css">
    <title>Lista de Agentes de Seguridad</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Agentes de Seguridad</h1>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agentes as $agente): ?>
                    <tr>
                        <td><?php echo $agente['id']; ?></td>
                        <td><?php echo $agente['nombres']; ?></td>
                        <td><?php echo $agente['apellidos']; ?></td>
                        <td><?php echo $agente['cedula']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
