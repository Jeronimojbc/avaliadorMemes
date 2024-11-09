<?php 

require_once 'app/models/UsuarioModel.php';

require 'app/views/usuarios/login.php';

require_once 'app/core/Database.php';

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
         }  else {
            $this->view->renderLogin();
            exit;
         }
         
         if ($this->model->loginModel($email, $password)) {
                $this->view->renderSuccess();
                header('Location: /user-on');

            } else {
                $this->view->renderError();
                (header('Location: /'));
            }    
    }

}
