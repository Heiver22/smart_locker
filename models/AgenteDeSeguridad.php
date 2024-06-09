<?php
class AgenteDeSeguridadModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM agente_de_seguridad');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM agente_de_seguridad WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nombres, $apellidos, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('INSERT INTO agente_de_seguridad (nombres, apellidos, cedula, contrasena) VALUES (:nombres, :apellidos, :cedula, :contrasena)');
        $stmt->execute([
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $nombres, $apellidos, $cedula, $contrasena) {
        $stmt = $this->pdo->prepare('UPDATE agente_de_seguridad SET nombres = :nombres, apellidos = :apellidos, cedula = :cedula, contrasena = :contrasena WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'contrasena' => $contrasena
        ]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM agente_de_seguridad WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
?>
