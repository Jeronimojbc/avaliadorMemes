<?php
    Class MemeModel //Essa Classe mexe com a tabela Memes
    {
        private $db;

        public function __construct() {

            $this->db = Database::getConnection();
            
        }

        function index() {
            echo"função index";
        }

        public function getAllMemes() {
           $query = $this->$db->query('SELECT * FROM memes ORDER BY media_avaliacao DESC');

           return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $query = $this->db->prepare("SELECT * FROM memes WHERE id = :id");
    
            $query->execute(['id' => $id]);
    
           
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function insert($data) {
            $query = $this->db->prepare("INSERT INTO memes (titulo, imagem_url, imagem_update, media_avaliacao) VALUES (:titulo, :imagem_url, :imagem_update, :media_avaliacao)");
    
            return $query->execute($data);
        }

        public function update($data) {
            $query = $this->db->prepare("UPDATE SET memes (titulo, imagem_url, imagem_update, media_avaliacao) VALUES (:titulo, :imagem_url, :imagem_update, :media_avaliacao)");
    
            return $query->execute($data);
        }

        public function delete($id)  {  
        $query = $this->db->prepare("DELETE FROM memes WHERE id = :id");

        return $query->execute(['id' => $id]);
    }
    }
    

        