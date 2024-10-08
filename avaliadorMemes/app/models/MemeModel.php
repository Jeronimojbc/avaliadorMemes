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
           $query = $this->db->query('SELECT * FROM memes ORDER BY media_avaliacao DESC');

           return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $query = $this->db->prepare("SELECT * FROM memes WHERE id = :id");
    
            $query->execute(['id' => $id]);
    
           
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function insert($meme) {
            $query = $this->db->prepare("INSERT INTO memes (titulo, descricao, imagem_url, imagem_upload) VALUES (:titulo, :descricao, :imagem_url, :imagem_upload)");

            return $query->execute($meme);

          
        }

 
        public function update($meme) {
            $query = $this->db->prepare("UPDATE SET memes (titulo, descricao, imagem_url, imagem_upload) VALUES (:titulo, :descricao, :imagem_url, :imagem_upload)");
    
            return $query->execute($meme);
        }

        public function delete($id)  {  
        $query = $this->db->prepare("DELETE FROM memes WHERE id = :id");

        return $query->execute(['id' => $id]);
    }

    // Funções para avaliar
        public function avaliar($id) {
            $query = $this->db->prepare("INSERT INTO avaliacoes (nota) VALUES (:nota)");
        }

      public function avaliarMeme($id, $avaliacao) {
           $query = "UPDATE memes_em_geral SET media_avaliacao = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii', $avaliacao, $id);
          $stmt->execute();
            }
    }
    

        
