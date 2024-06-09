<?php
class ResidentesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM residentes');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM residentes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nombres, $apellidos, $telefono, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('INSERT INTO residentes (nombres, apellidos, telefono, cedula, contrasena) VALUES (:nombres, :apellidos, :telefono, :cedula, :contrasena)');
        $stmt->execute([
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $nombres, $apellidos, $telefono, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('UPDATE residentes SET nombres = :nombres, apellidos = :apellidos, telefono = :telefono, cedula = :cedula, contrasena = :contrasena WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM residentes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
?>