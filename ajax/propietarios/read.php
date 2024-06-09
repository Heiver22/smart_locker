<?php
require_once '../../config/database.php';
require_once '../../models/Propietarios.php';

$pdo = require '../../config/database.php';
$model = new PropietariosModel($pdo);

$propietarios = $model->getAll();

echo json_encode($propietarios);
?>

