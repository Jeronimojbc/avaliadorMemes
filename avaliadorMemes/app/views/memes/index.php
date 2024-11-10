<?php 
// Inicia a sessão
session_start(); 
// Verifica se o usuário está logado
UsuariosController::isLogged();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Memes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #2C3E50; /* Fondo oscuro */
        }
        .container {
            color: #E5E5E5; /* Texto claro */
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #32CD32; /* Verde lima */
            border-color: #32CD32;
            color: #4B0082; /* Texto morado */
        }
        .btn-primary:hover {
            background-color: #228B22; /* Verde oscuro */
            border-color: #228B22;
        }
        .btn-secondary {
            background-color: #8A2BE2; /* Morado claro */
            border-color: #8A2BE2;
            color: #FFFFFF;
        }
        .btn-secondary:hover {
            background-color: #5D3FD3; /* Morado más oscuro */
            border-color: #5D3FD3;
        }
        .card {
            background-color: #4B0082; /* Fondo de tarjeta morado */
            color: #E5E5E5; /* Texto claro */
            border: 2px solid #32CD32; /* Borde verde lima */
        }
        .btn-info {
            background-color: #32CD32; /* Verde lima */
            border-color: #32CD32;
            color: #4B0082;
        }
        .btn-info:hover {
            background-color: #228B22; /* Verde oscuro */
            border-color: #228B22;
        }
    </style>
</head>

<body>
                         
    <div class="container">
        <h1 class="text-center mb-4">Bem-Vindo <?=$_SESSION['nome']; ?>, veja nossa nova Lista de Memes</h1>
        <div class="text-center mb-4">
            <a class="btn btn-primary" href="/memes">Cadastrar Novo Meme</a>
        </div>
        
        <div class="row">
            <?php foreach ($memes as $meme): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $meme['imagem_url'] ?: $meme['imagem_upload']; ?>" 
                            class="card-img-top" 
                            alt="<?php echo htmlspecialchars($meme['titulo']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($meme['titulo']) ?></h5>
                            <p class="card-text">Avaliação Média: <?= htmlspecialchars($meme['media_avaliacao']) ?></p>
                            <a href="/memes/show/<?= $meme['id'] ?>" class="btn btn-secondary">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a href="/logout" class="btn btn-info btn-sm" onclick="return confirm('Tem certeza que deseja sair?')">Log Out</a>
    </div>
</body>

</html>
