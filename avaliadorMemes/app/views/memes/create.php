<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Meme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Adicionar Meme</h1>
    <form action="/memes/store" method="post">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <input type="number" class="form-control" id="descricao" name="descricao">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
</body>
</html>
