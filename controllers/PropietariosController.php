<?php
require_once 'models/Propietarios.php';

class PropietariosController {
    private $model;

    public function __construct($pdo) {
        $this->model = new PropietariosModel($pdo);
    }

    public function index() {
        $propietarios = $this->model->getAll();
        require 'views/propietarios/index.php';
    }

    public function show($id) {
        $propietario = $this->model->getById($id);
        require 'views/propietarios/show.php';
    }

    public function create() {
        require 'views/propietarios/create.php';
    }

    public function store($data) {
        $this->model->create($data['nombres'], $data['apellidos'], $data['telefono'], $data['cedula'], $data['contrasena']);
        header('Location: index.php?action=index');
    }

    public function edit($id) {
        $propietario = $this->model->getById($id);
        require 'views/propietarios/edit.php';
    }

    public function update($id, $data) {
        $this->model->update($id, $data['nombres'], $data['apellidos'], $data['telefono'], $data['cedula'], $data['contrasena']);
        header('Location: index.php?action=index');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?action=index');
    }
}
?>
