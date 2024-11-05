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

    </head>

    <body>

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
                            <img src="<?php echo $meme['imagem_url']; ?>"
                                alt="<?php echo $meme['titulo'] ?>" width="100">
                        <?php elseif ($meme['imagem_upload']): ?>
                            <img src="<?php echo $meme['imagem_upload'] ?>"
                                alt="<?php echo $meme['titulo'] ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($meme['media_avaliacao']) ?></td>
                    <td>
                         <a href="/memes/show/<?= $meme['id'] ?>">Ver Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="/" class="btn btn-info btn-sm" onclick="return confirm('Tem certeza que deseja sair?')">Log Out</a>
</body>

        <div class="container">
            <h1 class="text-center mb-4">Lista de Memes</h1>
            <div class="text-center mb-4">
                <a class="btn btn-primary" href="/memes">Cadastrar Novo Meme</a>
            </div>
            
            <div class="row">
                <?php foreach ($memes as $meme): ?>
                    <div class="col-md-4">
                        <div class="card">
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

    </body>


    </html>
