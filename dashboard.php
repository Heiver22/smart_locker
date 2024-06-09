<?php
session_start();
require 'config\database.php';  // Incluyendo el archivo de conexión a la base de datos

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];
$rol = getRole($user);

function getRole($user) {
    if (isset($user['nombres']) && isset($user['apellidos'])) {
        return 'residente';
    } elseif (isset($user['apellidos'])) {
        return 'propietario';
    } elseif (isset($user['cedula']) && !isset($user['nombres']) && !isset($user['apellidos'])) {
        return 'agente_de_seguridad';
    } elseif (isset($user['nombre'])) {
        return 'visitante';
    }
    return null;
}

// Manejar la aceptación de solicitudes
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aceptar'])) {
    $solicitudId = $_POST['solicitud_id'];
    $stmt = $pdo->prepare('UPDATE solicitudes SET estado = "aceptado" WHERE id = ?');
    $stmt->execute([$solicitudId]);
    echo "Solicitud aceptada.";
    header('Location: dashboard.php');
    exit;
}

// Mostrar solicitudes pendientes
$stmt = $pdo->prepare('SELECT * FROM solicitudes WHERE estado = "pendiente"');
$stmt->execute();
$solicitudes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="public\css\dashboard\styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="public\js\dashboard\script.js" defer></script>
    <script src="public\js\dashboard\crud.js" defer></script>
</head>
<body>
<div class="sidebar">
    <h1>Admin Panel</h1>
    <button onclick="toggleDropdown('dropdown1')">Agentes de Seguridad</button>
    <div id="dropdown1" class="dropdown-content">
        <button onclick="loadForm('agente_de_seguridad', 'create')">Crear</button>
        <button onclick="loadForm('agente_de_seguridad', 'read')">Listar</button>
        <button onclick="loadForm('agente_de_seguridad', 'update')">Actualizar</button>
        <button onclick="loadForm('agente_de_seguridad', 'delete')">Eliminar</button>
    </div>
    <button onclick="toggleDropdown('dropdown2')">Propietarios</button>
    <div id="dropdown2" class="dropdown-content">
        <button onclick="loadForm('propietarios', 'create')">Crear</button>
        <button onclick="loadForm('propietarios', 'read')">Listar</button>
        <button onclick="loadForm('propietarios', 'update')">Actualizar</button>
        <button onclick="loadForm('propietarios', 'delete')">Eliminar</button>
    </div>
    <button onclick="toggleDropdown('dropdown3')">Residentes</button>
    <div id="dropdown3" class="dropdown-content">
        <button onclick="loadForm('residentes', 'create')">Crear</button>
        <button onclick="loadForm('residentes', 'read')">Listar</button>
        <button onclick="loadForm('residentes', 'update')">Actualizar</button>
        <button onclick="loadForm('residentes', 'delete')">Eliminar</button>
    </div>
    <button onclick="toggleDropdown('dropdown4')">Tipo de Paquete</button>
    <div id="dropdown4" class="dropdown-content">
        <button onclick="loadForm('tipo_paquete', 'create')">Crear</button>
        <button onclick="loadForm('tipo_paquete', 'read')">Listar</button>
        <button onclick="loadForm('tipo_paquete', 'update')">Actualizar</button>
        <button onclick="loadForm('tipo_paquete', 'delete')">Eliminar</button>
    </div>
    <button onclick="toggleDropdown('dropdown5')">Visitantes</button>
    <div id="dropdown5" class="dropdown-content">
    <button onclick="loadForm('visitantes', 'create')">Crear</button>
        <button onclick="loadForm('visitantes', 'read')">Listar</button>
        <button onclick="loadForm('visitantes', 'update')">Actualizar</button>
        <button onclick="loadForm('visitantes', 'delete')">Eliminar</button>
    </div>
    <a href="logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
</div>

<div id="formContainer">BIENVENIDO</div>
</body>
</html>
