<?php
require_once '../../config/database.php';
require_once '../../models/Propietarios.php';

$pdo = require '../../config/database.php';
$model = new PropietariosModel($pdo);

$propietarios = $model->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/vistas_propietarios/styles_propietarios_read.css">
    <title>Lista de Propietarios</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Propietarios</h1>
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
                <?php foreach ($propietarios as $propietario): ?>
                    <tr>
                        <td><?php echo $propietario['id']; ?></td>
                        <td><?php echo $propietario['nombres']; ?></td>
                        <td><?php echo $propietario['apellidos']; ?></td>
                        <td><?php echo $propietario['telefono']; ?></td>
                        <td><?php echo $propietario['cedula']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
