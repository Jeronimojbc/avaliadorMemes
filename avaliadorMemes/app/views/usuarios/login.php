<?php
class Views {
    public function renderLogin() {
        echo '
        <form method="POST" action="">
            <label for="email">Seu Melhor Email:</label>
            <input type="text" id="email" name="email">
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
