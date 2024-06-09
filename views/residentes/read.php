<?php
require_once '../../config/database.php';
require_once '../../models/Residentes.php';

$pdo = require '../../config/database.php';
$model = new ResidentesModel($pdo);

$residentes = $model->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\vistas_residentes\styles_residentes_read.css">
    <title>Lista de Residentes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Residentes</h1>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Cédula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($residentes as $residente): ?>
                    <tr>
                        <td><?php echo $residente['id']; ?></td>
                        <td><?php echo $residente['nombres']; ?></td>
                        <td><?php echo $residente['apellidos']; ?></td>
                        <td><?php echo $residente['telefono']; ?></td>
                        <td><?php echo $residente['cedula']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
