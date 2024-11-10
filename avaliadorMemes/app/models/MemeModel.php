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

        public function delete($id) {
            try {
                // Comenzar la transacción
                $this->db->beginTransaction();
        
                // Primero, eliminar las evaluaciones relacionadas
                $query = $this->db->prepare("DELETE FROM avaliacoes WHERE meme_id = :meme_id");
                $query->execute(['meme_id' => $id]);
        
                // Luego, eliminar el meme
                $query = $this->db->prepare("DELETE FROM memes WHERE id = :id");
                $query->execute(['id' => $id]);
        
                // Confirmar la transacción
                $this->db->commit();
        
                return true; // Retornar verdadero si la eliminación fue exitosa

                
            } catch (PDOException $e) {
                // Revertir la transacción en caso de error
                $this->db->rollBack();
                echo "Error al eliminar: " . $e->getMessage();
                return false; // Retornar falso en caso de error
            }
        }
        

        public function avaliar($meme_id, $avaliacoes) {
            // Primero, validar que el meme_id existe
            $query = $this->db->prepare("SELECT id FROM memes WHERE id = :meme_id");
            $query->execute(['meme_id' => $meme_id]);
            
            // Verificar si el meme existe
            if ($query->rowCount() > 0) {
                // Insertar la evaluación
                $insertQuery = $this->db->prepare("INSERT INTO avaliacoes (meme_id, nota) VALUES (:meme_id, :nota)");
                $insertQuery->execute(['meme_id' => $meme_id, 'nota' => $avaliacoes['nota']]);
                
                // Calcular la nueva media de las notas del meme
                $avgQuery = $this->db->prepare("SELECT AVG(nota) as media_avaliacao FROM avaliacoes WHERE meme_id = :meme_id");
                $avgQuery->execute(['meme_id' => $meme_id]);
                $result = $avgQuery->fetch(PDO::FETCH_ASSOC);
                
                // Obtener la media
                $media_avaliacao = $result['media_avaliacao'];
                
                // Actualizar la columna media_avaliacao en la tabla memes
                $updateQuery = $this->db->prepare("UPDATE memes SET media_avaliacao = :media_avaliacao WHERE id = :meme_id");
                return $updateQuery->execute(['media_avaliacao' => $media_avaliacao, 'meme_id' => $meme_id]);
            } else {
                // Manejo de error si el meme no existe
                throw new Exception("El meme con ID $meme_id no existe.");
            }
        }
        
        

      
    }


       
    
