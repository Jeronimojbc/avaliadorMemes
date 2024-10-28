<?php
class Views {
    public function renderLogin() {
        echo '
        <form method="POST" action="">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" name="username">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
            <button type="submit">Entrar</button>
        </form>
        ';
    }

    public function renderSuccess() {
        echo "Login bem-sucedido!";
    }

    public function renderError() {
        echo "Nome de usuário ou senha incorretos.";
    }
}
