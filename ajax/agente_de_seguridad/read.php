<?php
require_once '../../config/database.php';
require_once '../../models/AgenteDeSeguridad.php';

$pdo = require '../../config/database.php';
$model = new AgenteDeSeguridadModel($pdo);

$agentes = $model->getAll();

echo json_encode($agentes);
?>
