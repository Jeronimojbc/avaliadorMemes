<!-- /views/memes/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Memes</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Lista de Memes</h1>
    <a href="/index.php?controller=memes&action=create">Crear Nuevo Meme</a>
    <ul>
        <?php foreach ($memes as $meme): ?>
            <li>
                <h2><?php echo htmlspecialchars($meme['title']); ?></h2>
                <img src="<?php echo htmlspecialchars($meme['image_path']); ?>" alt="<?php echo htmlspecialchars($meme['title']); ?>" style="width: 100px;">
                <p><?php echo htmlspecialchars($meme['description']); ?></p>
                <a href="/index.php?controller=memes&action=show&id=<?php echo $meme['id']; ?>">Ver Detalles</a>
                <a href="/index.php?controller=memes&action=edit&id=<?php echo $meme['id']; ?>">Editar</a>
                <a href="/index.php?controller=memes&action=delete&id=<?php echo $meme['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este meme?');">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
