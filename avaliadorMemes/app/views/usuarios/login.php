
<?php
require_once 'app/models/UsuarioModel.php';
class Views {
    public function renderLogin() {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log-IN</title>
    </head>
    <body>
        <form method="POST" action="">

            <label for="email">Seu Melhor Email:</label>
            <input type="text" id="email" name="email">

            <label for="password">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Entrar</button>

            <br>
            <br>    
            <labe>Não tem uma conta?</label>
            <a href="/user-off">Cadastre-se AQUI</a>

        </form>
</body>
</html>';
    }
    public function renderSuccess() {
            header('Location: /user-on');
    }
    
    public function renderError() {
        echo 'Erro ao logar! <p> <a href="/">Tente Novamente</a> </p>';
      
    }

    public function renderCadastro() {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
    </head>
    <body>
        <form method="POST" action="/user-off">
    
            <label for="nome">Seu Nome Aqui:</label>
            <input type="text" id="nome" name="nome">
    
            <label for="email">Seu Melhor Email:</label>
            <input type="text" id="email" name="email">
    
            <label for="password">Senha:</label>
            <input type="password" id="senha" name="senha">
    
            <button type="submit">Cadastrar</button>
    
            <br>
            <br>    
            <labe>Tem uma conta?</label>
            <a href="/">Login</a>   
    
        </form> 
    </body>
    </html>';  
    }
}