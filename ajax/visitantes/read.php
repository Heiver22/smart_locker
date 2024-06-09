<?php
require_once '../../config/database.php';
require_once '../../models/Visitantes.php';

$pdo = require '../../config/database.php';
$model = new VisitantesModel($pdo);

$visitantes = $model->getAll();

echo json_encode($visitantes);
?>
