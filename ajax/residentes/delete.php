<?php
require_once '../../config/database.php';
require_once '../../models/Residentes.php';

$pdo = require '../../config/database.php';
$model = new ResidentesModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$model->delete($id);

echo json_encode(['message' => 'Residente eliminado exitosamente']);
?>
