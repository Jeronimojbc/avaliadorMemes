<?php 
session_start();
UsuariosController::isLogged();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Meme</title>
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
            background-color: #4B0082; /* Morado profundo */
            color: #E5E5E5; /* Texto claro */
            border: 2px solid #32CD32; /* Borde verde lima */
            border-radius: 8px;
            padding: 20px;
            margin-top: 50px;
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
        .form-label {
            color: #E5E5E5; /* Etiquetas claras */
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-4">Cadastrar Novo Meme</h1>
        <form action="/memes/store" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" name="descricao" required></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem_url" class="form-label">URL da Imagem:</label>
                <input type="url" class="form-control" name="imagem_url">
            </div>

            <div class="mb-3">
                <label for="imagem_upload" class="form-label">Ou faça upload da imagem:</label>
                <input type="file" class="form-control" name="imagem_upload">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Meme</button>
            <a href="/user-on" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

</body>

</html>
