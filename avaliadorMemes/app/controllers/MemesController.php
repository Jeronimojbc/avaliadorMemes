<?php

require_once 'app/models/MemeModel.php';

class MemesController
{
    private $model;

    public function __construct()
    {
        $this->model = new MemeModel();
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
        // Inicializar os dados do meme
        $meme = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'imagem_url' => '',  // Inicializando como vazio, será preenchido se uma URL for fornecida
            'imagem_upload' => '', // Inicializando como vazio, será preenchido se um arquivo for enviado
        ];
    
        // Verificar se foi fornecida uma URL para a imagem
        if (isset($_POST['imagem_url']) && !empty($_POST['imagem_url'])) {
            $imagem_url = $_POST['imagem_url'];
            
            // Validar a URL (opcional)
            if (filter_var($imagem_url, FILTER_VALIDATE_URL)) {
                $meme['imagem_url'] = $imagem_url; // Se a URL for válida, armazena-a no array
            } else {
                echo 'URL inválida!';
                exit;
            }
        }
        // Caso contrário, processar o upload do arquivo
        elseif (isset($_FILES['imagem_upload']) && $_FILES['imagem_upload']['error'] == 0) {
            $arquivo = $_FILES['imagem_upload'];  // Pega o arquivo enviado pelo formulário
            $nomeDoArquivo = $arquivo['name']; 
            $pasta = 'app/public/uploads';
            $novoNomeArquivo = uniqid(); // Usa essa função para dar um nome único para o arquivo
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION)); /* Pega a extensão do arquivo e coloca em minúsculo */
        
            // Verificar se houve erro no envio do arquivo
            if ($arquivo['error']) {
                echo 'Falha ao enviar o arquivo!';
                exit;
            }
        
            // Verificar o tamanho do arquivo (máximo de 2MB)
            if ($arquivo['size'] > 2097152) { // 2097152 = 2MB
                echo 'Arquivo muito grande!';
                exit;
            }
        
            // Verificar a extensão do arquivo
            if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg' && $extensao != 'webp') {
                echo 'Não aceitamos este tipo de Arquivo!';
                exit;
            }
        
            // Mover o arquivo para a pasta de uploads
            $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . '/' . $novoNomeArquivo . '.' . $extensao);
        
            // Verificar se o arquivo foi movido com sucesso
            if (!$deu_certo) {
                echo 'Falha ao enviar o arquivo!';
                exit;
            }
        
            // Definir o caminho da imagem carregada
            $meme['imagem_upload'] = '/' . $pasta . '/' . $novoNomeArquivo . '.' . $extensao;
        } else {
            // Se não foi fornecido nem URL nem arquivo, mostrar erro
            echo 'Nenhuma imagem foi fornecida!';
            exit;
        }
    
        // Chamar o método de inserção no banco de dados
        $this->model->insert($meme);
    
        // Redirecionar após o sucesso
        header('Location: /show');
        exit; // Garantir que o redirecionamento aconteça imediatamente
    }
    
    
    public function show($id)
    {
        $meme = $this->model->getById($id);

        
        require 'app/views/memes/show.php';
    }

    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: /user-on');
    }

    public function avaliar($meme_id) {
        $avaliacoes = [
            'nota' => $_POST['nota']
        ];
        
        try {
            // Llamar al método avaliar del modelo
            $this->model->avaliar($meme_id, $avaliacoes);
            
            // Redirigir después de la evaluación
            header('Location: /show'); 
        } catch (Exception $e) {
            // Manejar el error, por ejemplo, mostrar un mensaje
            echo $e->getMessage();
        }
    }
    
        
        
}