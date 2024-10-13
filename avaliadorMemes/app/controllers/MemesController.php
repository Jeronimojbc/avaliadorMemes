<?php

require_once 'app/models/MemeModel.php';

class MemesController
{
    private $model;

    public function __construct()
    {
        $this->model = new MemeModel();
    }
    
    public function index()
    {
        $memes = $this->model->getAllMemes();
        include 'app/views/memes/index.php';
    }

    public function create()
    {

        include 'app/views/memes/create.php';
    }

    public function store()
    {
        $meme =  [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem_url' => $_POST['imagem_url'],  
            'imagem_upload'=> $_POST['imagem_upload'], 
        ];
        
        $arquivo = $_FILES['imagem_upload'];  //pega o arquivo enviado pelo formulário
        $nomeDoAqrquivo = $arquivo['name']; 
        $pasta = 'app/public/uploads/';
        $novoNomeArquivo = uniqid(); // usa essa funcao para dar um nome unico para o arquivo
        $extensao = strtolower(pathinfo($nomeDoAqrquivo, PATHINFO_EXTENSION)); /* pega a extensão do arquivo 
        e coloca em minusculo */

        if($arquivo['error']) {
            echo 'Falha ao enviar o arquivo!';
            exit;
        }

        if($arquivo['size'] > 2097152) { // 2097152 = 2 MB
            echo 'Arquivo muito grande!';
            exit;
        }

        if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg' && $extensao != 'gif'){
            echo 'Não aceitamos este tipo de Arquivo!';
            exit;
        }

        $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . '/' . $novoNomeArquivo . '.' . $extensao);

        if(!$deu_certo){
            echo 'Falha ao enviar o arquivo!';
            exit;
        }

        $meme['imagem_upload'] =  $pasta . '/' . $novoNomeArquivo . '.' . $extensao;
        echo "<pre>";
        var_dump($meme);
       
    
        $this->model->insert($meme);
        header('Location: /show');

    }
    
    public function show($id)
    {
        $memes = $this->model->getById($id);
    // echo "<pre>";
    // print_r($memes);
    // exit;
        
        require 'app/views/memes/show.php';
    }

    public function update($id)
    {
        $meme = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem_url' => $_POST['imagem_url'],   
            'imagem_upload' => $_POST['imagem_upload'],
        ];
        $this->model->update($id, $meme);
        header('Location: /memes');

    }

    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: /memes');
    }

    
     public function avaliar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $memeId = isset($_GET['id']) ? intval($_GET['id']) : 0;
                $avaliacao = isset($_POST['avaliacao']) ? intval($_POST['avaliacao']) : 0;
    
                if ($memeId && $rating) {
                    $memeModel = new MemeModel();
                    $memeModel->avaliarMeme($memeId, $rating);
    
                    // Redirect or provide feedback
                    echo "Meme Avaliado com Sucesso!";
                } else {
                    echo "Id Invalido Deu Errooo!.";
                }
            }
        }
   
    
}