<?php
require_once '../../config/database.php';
require_once '../../models/TipoPaquete.php';

$pdo = require '../../config/database.php';
$model = new TipoPaqueteModel($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'create') {
    $data = json_decode(file_get_contents("php://input"), true);
    $tipo = $data['tipo'];
    $model->create($tipo);
    echo json_encode(['message' => 'Tipo de paquete creado exitosamente']);
}

// Read
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'read') {
    $tipos = $model->getAll();
    echo json_encode($tipos);
}

// Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $tipo = $data['tipo'];
    $model->update($id, $tipo);
    echo json_encode(['message' => 'Tipo de paquete actualizado exitosamente']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $model->delete($id);
    echo json_encode(['message' => 'Tipo de paquete eliminado exitosamente']);
}
?>
