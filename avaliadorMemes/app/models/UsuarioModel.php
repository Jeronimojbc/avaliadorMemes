<?php

class UsuarioModel {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
        // echo"UserModel Funcionando";
    }
   public function loginModel($email, $senha) {
    $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Fetch the result as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // $id = $user['id'];
    // $nome = $user['nome'];

    return $user ? $user : false;
}
  public function getAll() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert ($data) {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':senha', $data['senha']);
        $stmt->execute();
        return true;
    }
}
    