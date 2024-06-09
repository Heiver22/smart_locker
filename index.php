<?php
session_start();
require 'config\database.php';  // Incluyendo el archivo de conexión a la base de datos

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasena'];

    $user = null;

    // Verificar en residentes
    $stmt = $pdo->prepare('SELECT * FROM residentes WHERE cedula = ?');
    $stmt->execute([$cedula]);
    $user = $stmt->fetch();

    if (!$user) {
        // Verificar en propietarios
        $stmt = $pdo->prepare('SELECT * FROM propietarios WHERE cedula = ?');
        $stmt->execute([$cedula]);
        $user = $stmt->fetch();
    }

    if (!$user) {
        // Verificar en agente_de_seguridad
        $stmt = $pdo->prepare('SELECT * FROM agente_de_seguridad WHERE cedula = ?');
        $stmt->execute([$cedula]);
        $user = $stmt->fetch();
    }

    if (!$user) {
        // Verificar en visitantes
        $stmt = $pdo->prepare('SELECT * FROM visitantes WHERE cedula = ?');
        $stmt->execute([$cedula]);
        $user = $stmt->fetch();
    }

    if ($user && $user['contrasena'] === $contrasena) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Cédula o contraseña incorrecta.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public\css\index\styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <form action="index.php" method="post">
        <label for="cedula">Cédula:</label>
        <input type="text" name="cedula" id="cedula" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>
        <button type="submit">Login</button>
        <?php
if (isset($error)) {
    echo "<p class='error-message'>" . htmlspecialchars($error) . "</p>";
}
?>
    </form>


</body>
</html>
