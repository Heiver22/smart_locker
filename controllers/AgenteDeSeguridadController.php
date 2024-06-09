<?php
require_once 'models/AgenteDeSeguridad.php';

class AgenteDeSeguridadController {
    private $model;

    public function __construct($pdo) {
        $this->model = new AgenteDeSeguridadModel($pdo);
    }

    public function index() {
        $agentes = $this->model->getAll();
        require 'views/agente_de_seguridad/index.php';
    }

    public function show($id) {
        $agente = $this->model->getById($id);
        require 'views/agente_de_seguridad/show.php';
    }

    public function create() {
        require 'views/agente_de_seguridad/create.php';
    }

    public function store($data) {
        $this->model->create($data['nombres'], $data['apellidos'], $data['cedula'], $data['contrasena']);
        header('Location: index.php?action=index');
    }

    public function edit($id) {
        $agente = $this->model->getById($id);
        require 'views/agente_de_seguridad/edit.php';
    }

    public function update($id, $data) {
        $this->model->update($id, $data['nombres'], $data['apellidos'], $data['cedula'], $data['contrasena']);
        header('Location: index.php?action=index');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?action=index');
    }
}
?>
