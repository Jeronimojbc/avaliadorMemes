<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Meme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>

    <h1><?= htmlspecialchars($meme['titulo']) ?></h1>
    <p><?= htmlspecialchars($meme['descricao']) ?></p>

    <?php if ($meme['imagem_upload']): ?>
        <img src="<?php echo ($meme['imagem_upload']) ?>" alt="<?php echo htmlspecialchars($meme['titulo']) ?>" width="300">
    <?php elseif ($meme['imagem_upload']): ?>
        <img src="<?php echo ($meme['imagem_upload']) ?>" alt="<?php echo htmlspecialchars($meme['titulo']) ?>"
            width="300">
    <?php endif; ?>

    <h2>Avaliação Média: <?= htmlspecialchars($meme['media_avaliacao']) ?></h2>

    <h3>Avaliar este Meme:</h3>
    <form action="avaliar/<?= $meme['id'] ?>" method="POST">
        <label for="nota">Nota (1-5):</label>
        <select name="nota" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Enviar Avaliação</button>
    </form>
    <a href="/memes/delete/<?= $meme['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este meme 🙃?')">Excluir</a>


</body>

</html>