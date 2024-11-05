<?php 

require_once 'app/models/UsuarioModel.php';


require 'app/views/usuarios/login.php';

class UsuariosController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new Usuariomodel();
        $this->view = new Views();
    }

    public function loginController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->model->loginModel($email, $password)) {
                $this->view->renderSuccess();
                header('Location: /user-on');
            } else {
                $this->view->renderError();
                (header('Location: /'));
            }
        } else {
            $this->view->renderLogin();

        } public function __construct($model) {
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

