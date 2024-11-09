
<?php
class Views {
    public function renderLogin() {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="">

            <label for="email">Seu Melhor Email:</label>
            <input type="text" id="email" name="email">

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">

            <button type="submit">Entrar</button>

            <?php foreach ($usuarios as $user): ?>
         <option value="<?= $user->id ?>"><?=($user->nome) ?></option>
            <?php endforeach; ?>

        </form>
</body>
</html>';
    }
    public function renderSuccess() {
        echo 'Login efetuado com sucesso!';
        header('Location: /user-on');
    }
    public function renderError() {
        echo 'Erro ao logar!';
        header('Location: /');
    }
}