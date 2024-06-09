<?php
require_once '../../config/database.php';
require_once '../../models/Residentes.php';

$pdo = require '../../config/database.php';
$model = new ResidentesModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$nombres = $data['nombres'];
$apellidos = $data['apellidos'];
$telefono = $data['telefono'];
$cedula = $data['cedula'];
$contrasena = $data['contrasena'];

$model->create($nombres, $apellidos, $telefono, $cedula, $contrasena);

echo json_encode(['message' => 'Residente creado exitosamente']);
?>