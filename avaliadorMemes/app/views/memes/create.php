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

    <h1>Cadastrar Novo Meme</h1>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label for="imagem_url">URL da Imagem:</label>
        <input type="url" name="imagem_url">

        <label for="imagem_upload">Ou faça upload da imagem:</label>
        <input type="file" name="imagem_upload">

        <button type="submit">Cadastrar Meme</button>
    </form>

</body>

</html>