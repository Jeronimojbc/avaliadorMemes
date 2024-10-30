
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if (isset($erroooou)): // se a var de erro existir ele nem loga?> 
            <div role="alert">
                <?= $erroooou ?>
            </div>
        <?php endif; ?>


        <form method="POST" action="/login">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" name="username">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
            <button type="submit">Entrar</button>

            <?php foreach ($usuarios as $user): ?>
                 <option value="<?= $user->id ?>"><?=($user->nome) ?></option>
     <?php endforeach; ?>

        </form>
</body>
</html>
