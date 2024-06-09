<?php
require_once '../../config/database.php';
require_once '../../models/Visitantes.php';

$pdo = require '../../config/database.php';
$model = new VisitantesModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombre = $data['nombre'];
$apellidos = $data['apellidos'];
$cedula = $data['cedula'];
$contrasena = $data['contrasena'];

$model->update($id, $nombre, $apellidos, $cedula, $contrasena);

echo json_encode(['message' => 'Visitante actualizado exitosamente']);
?>