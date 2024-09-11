<!-- /views/memes/create.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Meme</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Crear Nuevo Meme</h1>
    <form action="/index.php?controller=memes&action=store" method="POST" enctype="multipart/form-data">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="image">Imagen:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <input type="submit" value="Crear Meme">
    </form>
    <a href="/index.php?controller=memes&action=index">Volver a la lista de memes</a>
</body>
</html>
