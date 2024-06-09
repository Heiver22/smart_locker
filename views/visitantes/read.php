<?php
require_once '../../config/database.php';
require_once '../../models/Visitantes.php';

$pdo = require '../../config/database.php';
$model = new VisitantesModel($pdo);

$visitantes = $model->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\vistas_visitantes\styles_visitantes_read.css">
    <title>Lista de Visitantes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Visitantes</h1>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitantes as $visitante): ?>
                    <tr>
                        <td><?php echo $visitante['id']; ?></td>
                        <td><?php echo $visitante['nombre']; ?></td>
                        <td><?php echo $visitante['apellidos']; ?></td>
                        <td><?php echo $visitante['cedula']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
