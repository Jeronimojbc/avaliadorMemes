<!-- /views/memes/show.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Meme</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($meme['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($meme['image_path']); ?>" alt="<?php echo htmlspecialchars($meme['title']); ?>" style="width: 300px;">
    <p><?php echo htmlspecialchars($meme['description']); ?></p>
    <a href="/index.php?controller=memes&action=edit&id=<?php echo $meme['id']; ?>">Editar</a>
    <a href="/index.php?controller=memes&action=delete&id=<?php echo $meme['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este meme?');">Eliminar</a>
    <a href="/index.php?controller=memes&action=index">Volver a la lista de memes</a>
</body>
</html>
