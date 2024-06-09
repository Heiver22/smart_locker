<?php
class TipoPaqueteModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM tipo_paquete');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM tipo_paquete WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($tipo) {
        $stmt = $this->pdo->prepare('INSERT INTO tipo_paquete (tipo) VALUES (:tipo)');
        $stmt->execute(['tipo' => $tipo]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $tipo) {
        $stmt = $this->pdo->prepare('UPDATE tipo_paquete SET tipo = :tipo WHERE id = :id');
        $stmt->execute(['id' => $id, 'tipo' => $tipo]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM tipo_paquete WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
?>
