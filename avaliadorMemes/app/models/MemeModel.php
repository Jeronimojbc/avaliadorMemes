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

        public function delete($id)  {  
        $query = $this->db->prepare("DELETE FROM memes WHERE id = :id");

        return $query->execute(['id' => $id]);
    }

    // Funções para avaliar
        /* public function avaliar($avaliacoes) {
            $query = $this->db->prepare("INSERT INTO avaliacoes (nota) VALUES (:nota)");
            return $query->execute(['nota' => $nota]);
        } */


        public function avaliar($meme_id, $avaliacoes) {
            // Primero, validar que el meme_id existe
            $query = $this->db->prepare("SELECT id FROM memes WHERE id = :meme_id");
            $query->execute(['meme_id' => $meme_id]);
            
            // Verificar si el meme existe
            if ($query->rowCount() > 0) {
                // Insertar la evaluación
                $insertQuery = $this->db->prepare("INSERT INTO avaliacoes (meme_id, nota) VALUES (:meme_id, :nota)");
                return $insertQuery->execute(['meme_id' => $meme_id, 'nota' => $avaliacoes['nota']]);
            } else {
                // Manejo de error si el meme no existe
                throw new Exception("El meme con ID $meme_id no existe.");
            }
        }
    }

       
    
