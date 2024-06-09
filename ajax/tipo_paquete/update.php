<?php
require_once '../../config/database.php';
require_once '../../models/TipoPaquete.php';

$pdo = require '../../config/database.php';
$model = new TipoPaqueteModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$tipo = $data['tipo'];

$model->update($id, $tipo);

echo json_encode(['message' => 'Tipo de paquete actualizado exitosamente']);
?>
