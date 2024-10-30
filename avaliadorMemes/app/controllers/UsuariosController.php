<?php 

require_once 'app/models/UsuarioModel.php';

require_once 'app/views/usuarios/login.php';

require_once 'app/core/Database.php';

class UsuariosController {
    private $model;

    public function __construct($model) {
        $this->model = new UsuarioModel();
    }

    public function index() {
      $usuarios = $this->model->getAll();
      include '../views/login.php';
    }

    public function login(){

    $id = $_POST['user_id'];
    $senha = $_POST['senha'];
    $usuario = $this->model->getById($id);
    $senha_db = $user->senha;
        if($senha == $senha_bd){
            header('Location: /home');
        }else{
            $users = $this->model->getAll();
            $error = "Usuário ou senha inválidos";
            require 'views/usuarios/login.php';
        }
    }
}
