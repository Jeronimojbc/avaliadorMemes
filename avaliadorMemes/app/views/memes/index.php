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

    <h1>Lista de Memes</h1>
    <a href="create.php">Cadastrar Novo Meme</a>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Imagem</th>
                <th>Avaliação Média</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memes as $meme): ?>
                <tr>
                    <td><?= htmlspecialchars($meme['titulo']) ?></td>
                    <td>
                        <?php if ($meme['imagem_url']): ?>
                            <img src="<?= htmlspecialchars($meme['imagem_url']) ?>"
                                alt="<?= htmlspecialchars($meme['titulo']) ?>" width="100">
                        <?php elseif ($meme['imagem_upload']): ?>
                            <img src="uploads/<?= htmlspecialchars($meme['imagem_upload']) ?>"
                                alt="<?= htmlspecialchars($meme['titulo']) ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($meme['media_avaliacao']) ?></td>
                    <td>
                        <a href="show.php?id=<?= $meme['id'] ?>">Ver Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>