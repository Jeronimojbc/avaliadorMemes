<?php
session_start();
UsuariosController::isLogged();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Meme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #2C3E50; /* Fondo oscuro */
            color: #E5E5E5; /* Texto claro */
        }
        .container {
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
            background-color: #5D3FD3; /* Morado oscuro */
            border-color: #5D3FD3;
        }
        .btn-danger {
            background-color: #FF1493; /* Rosa fuerte */
            border-color: #FF1493;
            color: #FFFFFF;
        }
        .btn-danger:hover {
            background-color: #C71585; /* Rosa oscuro */
            border-color: #C71585;
        }
        .img-meme {
            max-width: 100%;
            border: 2px solid #32CD32; /* Borde verde lima */
            border-radius: 8px;
        }
        select.form-select {
            background-color: #4B0082; /* Fondo morado */
            color: #FFFFFF;
            border-color: #32CD32; /* Borde verde */
        }
        select.form-select option {
            color: #000000; /* Opciones negras */
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center"><?= htmlspecialchars($meme['titulo']) ?></h1>
        <p class="text-center"><?= htmlspecialchars($meme['descricao']) ?></p>

        <div class="text-center mb-4">
            <?php if ($meme['imagem_upload']): ?>
                <img src="<?php echo htmlspecialchars($meme['imagem_upload']) ?>" 
                     alt="<?php echo htmlspecialchars($meme['titulo']) ?>" 
                     class="img-meme">
            <?php elseif ($meme['imagem_url']): ?>
                <img src="<?php echo htmlspecialchars($meme['imagem_url']) ?>" 
                     alt="<?php echo htmlspecialchars($meme['titulo']) ?>" 
                     class="img-meme">
            <?php endif; ?>
        </div>

        <h2 class="text-center">Avaliação Média: <?= htmlspecialchars($meme['media_avaliacao']) ?></h2>

        <h3 class="mt-4">Avaliar este Meme:</h3>
        <form action="avaliar/<?= $meme['id'] ?>" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nota" class="form-label">Nota (1-5):</label>
                <select name="nota" class="form-select" required>
                    <option value="" disabled selected>Escolha uma nota</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
        </form>

        <a href="/memes/delete/<?= $meme['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar este meme 🙃?')">Excluir</a>
        <a href="/user-on" class="btn btn-secondary">Voltar</a>
    </div>

</body>

</html>
