<?php

class UsuarioModel {

    private $db;

    public function __construct($db) {
        $this->db = Database::getConnection();
        echo"UserModel Funcionando";
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha"); # prepara o comando
        $query->execute(); #faaz o SELECT nesse caso
        return $query->fetchAll(PDO::FETCH_OBJ); # retorna
    }
    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}