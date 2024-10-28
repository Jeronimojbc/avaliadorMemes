<?php 

require_once 'app/models/UsuarioModel.php';

require 'app/models/login.php';

class UsuarioController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function loginController() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->model->login($username, $password)) {
                $this->view->renderSuccess();
            } else {
                $this->view->renderError();
            }
        } else {
            $this->view->renderLogin();
        }
    }
}
