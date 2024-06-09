<?php
require_once '../../config/database.php';
require_once '../../models/TipoPaquete.php';

$pdo = require '../../config/database.php';
$model = new TipoPaqueteModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$tipo = $data['tipo'];

$model->create($tipo);

echo json_encode(['message' => 'Tipo de paquete creado exitosamente']);
?>
