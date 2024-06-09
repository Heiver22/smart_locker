<?php
require_once '../../config/database.php';
require_once '../../models/Residentes.php';

$pdo = require '../../config/database.php';
$model = new ResidentesModel($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'create') {
    $data = json_decode(file_get_contents("php://input"), true);
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $telefono = $data['telefono'];
    $cedula = $data['cedula'];
    $contrasena = $data['contrasena'];
    $model->create($nombres, $apellidos, $telefono, $cedula, $contrasena);
    echo json_encode(['message' => 'Residente creado exitosamente']);
}

// Read
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'read') {
    $residentes = $model->getAll();
    echo json_encode($residentes);
}

// Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $telefono = $data['telefono'];
    $cedula = $data['cedula'];
    $contrasena = $data['contrasena'];
    $model->update($id, $nombres, $apellidos, $telefono, $cedula, $contrasena);
    echo json_encode(['message' => 'Residente actualizado exitosamente']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $model->delete($id);
    echo json_encode(['message' => 'Residente eliminado exitosamente']);
}
?>
