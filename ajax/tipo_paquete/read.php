<?php
require_once '../../config/database.php';
require_once '../../models/TipoPaquete.php';

$pdo = require '../../config/database.php';
$model = new TipoPaqueteModel($pdo);

$tipos = $model->getAll();

echo json_encode($tipos);
?>
