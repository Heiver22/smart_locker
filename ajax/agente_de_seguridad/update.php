<?php
require_once '../../config/database.php';
require_once '../../models/AgenteDeSeguridad.php';

$pdo = require '../../config/database.php';
$model = new AgenteDeSeguridadModel($pdo);

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombres = $data['nombres'];
$apellidos = $data['apellidos'];
$cedula = $data['cedula'];
$contrasena = $data['contrasena'];

$model->update($id, $nombres, $apellidos, $cedula, $contrasena);

echo json_encode(['message' => 'Agente de seguridad actualizado exitosamente']);
?>
