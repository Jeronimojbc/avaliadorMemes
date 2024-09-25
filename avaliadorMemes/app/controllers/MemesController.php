<?php

require_once 'app/models/MemesController.php';

class MemesController
{
    private $model;

    public function __construct()
    {
        $this->model = new model();
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
        $data =  [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem_url' => $_POST['imagem_url'],   
            'imagem_upload' => $_POST['imagem_upload'],   
        ];
        $this->model->insert($data);
        header('Location: /memes');

    }
    
    public function show($id)
    {
        $meme = $this->model->getMemeById($id);
        require 'views/memes/show.php';
    }

    public function update($id)
    {
        $data = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem_url' => $_POST['imagem_url'],   
            'imagem_upload' => $_POST['imagem_upload'],
        ];
        $this->model->update($id, $data);
        header('Location: /memes');

    }

    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: /memes');
    }
}