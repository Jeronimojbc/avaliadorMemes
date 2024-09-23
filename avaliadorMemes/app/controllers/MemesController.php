<?php

require_once '../app/Models/MemeModel.php';

class MemesController
{
    private $model;

    public function __construct()
    {
        $this->model = new MemeModel();
    }

    // Mostrar lista de memes
    public function index()
    {
        $memes = $this->memeModel->getAllMemes();
        require 'views/memes/index.php';
    }

    public function create()
    {
        include '../app/Views/memes/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_FILES['image'];

            // Validar y guardar la imagen
            if ($image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../public/uploads/';
                $uploadFile = $uploadDir . basename($image['name']);
                
                if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                    $this->memeModel->createMeme($title, $description, $uploadFile);
                    header('Location: /index.php?controller=memes&action=index');
                } else {
                    // Manejar error de carga
                    echo "Error al cargar el archivo.";
                }
            } else {
                // Manejar error de carga
                echo "Error en la carga del archivo.";
            }
        }
    }

    // Mostrar detalles de un meme específico
    public function show($id)
    {
        $meme = $this->memeModel->getMemeById($id);
        require 'views/memes/show.php';
    }

    // Mostrar formulario para editar un meme
    public function edit($id)
    {
        $meme = $this->memeModel->getMemeById($id);
        require 'views/memes/edit.php';
    }

    // Procesar la actualización de un meme
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            // Validar y actualizar la imagen
            $image = $_FILES['image'];
            if ($image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../public/uploads/';
                $uploadFile = $uploadDir . basename($image['name']);
                
                if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                    $this->memeModel->updateMeme($id, $title, $description, $uploadFile);
                    header('Location: /index.php?controller=memes&action=index');
                } else {
                    // Manejar error de carga
                    echo "Error al cargar el archivo.";
                }
            } else {
                // Manejar error de carga
                echo "Error en la carga del archivo.";
            }
        }
    }

    // Procesar la eliminación de un meme
    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: /memes');
    }
}

