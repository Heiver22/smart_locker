<?php
require_once '../../config/database.php';
require_once '../../models/Visitantes.php';

$pdo = require '../../config/database.php';
$model = new VisitantesModel($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'create') {
    $data = json_decode(file_get_contents("php://input"), true);
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $cedula = $data['cedula'];
    $contrasena = $data['contrasena'];
    $model->create($nombre, $apellidos, $cedula, $contrasena);
    echo json_encode(['message' => 'Visitante creado exitosamente']);
}

// Read
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'read') {
    $visitantes = $model->getAll();
    echo json_encode($visitantes);
}

// Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $cedula = $data['cedula'];
    $contrasena = $data['contrasena'];
    $model->update($id, $nombre, $apellidos, $cedula, $contrasena);
    echo json_encode(['message' => 'Visitante actualizado exitosamente']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $model->delete($id);
    echo json_encode(['message' => 'Visitante eliminado exitosamente']);
}
?>
