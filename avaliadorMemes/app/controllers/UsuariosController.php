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
            $senha = $_POST['senha'];

        }  else {
            $this->view->renderLogin();
            exit;
         }

         if (empty($email) || empty($senha)) {
            echo "<script>alert('PQ vc não preencheu tudo?'); window.location.href = '/';</script>";
            exit;
        }
        

         if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
         
         if ($this->model->loginModel($email, $senha)) {
               
                $id = $this->model->loginModel($email, $senha)['id'];
                $nome = $this->model->loginModel($email, $senha)['nome'];
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;
               
                $this->view->renderSuccess();
            } else {
                $this->view->renderError();
            }    
    }

    public function cadastroController() {
        $this->view->renderCadastro();
        if($_POST){   
          $data = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ];
        // $nome = $_POST['nome'];
        // $_SESSION['nome'] = $nome;

    $this->model->insert($data);
    echo '<hr> <a href="/">Pagina de Login</a> Feito o Brique Piá Veio!';
    
}       
    }
    public function logoutController() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); //isto me tomou muito tempo
        }
        if (isset($_SESSION['id'])) {
           
            session_destroy();
            header ('Location: /index.php');
        } else {
            echo 'Erro ao deslogar! <p> <a href="/user-on">Tente Novamente</a> </p>';
            // var_dump($_SESSION['id']);
            exit;
            header ('Location: /user-on');
        }
    
    }

    public static function isLogged() {
        if (!isset($_SESSION['id'])) {
            echo'Você não tem permissão pra acessar esta página!
            <a href="/index.php">Logue-se</a>';
            exit;
        }
            
    }
}
