<?php

require_once '../app/Models/MemeModel.php';

class MemesController
{
    private $model;

    public function __construct()
    {
        $this->model = new MemeModel();
    }

    public function index()
    {
        $memes = $this->model->getAll();
        
        include '../app/Views/memes/index.php';
    }

    public function create()
    {
        include '../app/Views/memes/create.php';
    }

    public function store()
    {
        $data = [
            'titulo' => $_POST['titulo'],  
            'url' => $_POST['url'],  
            'descricao' => $_POST['descricao']
        ];

        $this->model->insert($data);

        header('Location: /memes');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: /memes');
    }
}
