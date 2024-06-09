<?php
class VisitantesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM visitantes');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM visitantes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nombre, $apellidos, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('INSERT INTO visitantes (nombre, apellidos, cedula, contrasena) VALUES (:nombre, :apellidos, :cedula, :contrasena)');
        $stmt->execute([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $nombre, $apellidos, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('UPDATE visitantes SET nombre = :nombre, apellidos = :apellidos, cedula = :cedula, contrasena = :contrasena WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM visitantes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
?>
