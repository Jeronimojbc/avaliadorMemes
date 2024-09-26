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
            'imagem_upload' => $_POST['imagem_upload'],   
        ];
        $this->model->insert($meme);
        header('Location: /memes');

    }
    
    public function show($id)
    {
        $memes = $this->model->getById($id);
echo "<pre>";
print_r($memes);
exit;


        require 'views/memes/show.php';
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
}