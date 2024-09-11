<?php

// /models/MemeModel.php

require_once 'core/Database.php';

class MemeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Obtener todos los memes
    public function getAllMemes()
    {
        $query = 'SELECT * FROM memes';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un meme por su ID
    public function getMemeById($id)
    {
        $query = 'SELECT * FROM memes WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo meme
    public function createMeme($title, $description, $imagePath)
    {
        $query = 'INSERT INTO memes (title, description, image_path) VALUES (:title, :description, :image_path)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $imagePath, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Actualizar un meme existente
    public function updateMeme($id, $title, $description, $imagePath)
    {
        $query = 'UPDATE memes SET title = :title, description = :description, image_path = :image_path WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $imagePath, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar un meme
    public function deleteMeme($id)
    {
        $query = 'DELETE FROM memes WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

