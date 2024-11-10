<?php
require_once 'app/models/UsuarioModel.php';
class Views {
    public function renderLogin() {
        echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Log-IN</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <style>
                body {
                    background-color: #2C3E50; /* Fondo oscuro */
                }
                .card {
                    background-color: #4B0082; /* Morado profundo */
                    color: #E5E5E5;
                    border: 2px solid #32CD32; /* Verde lima para el borde */
                }
                .btn-primary {
                    background-color: #32CD32; /* Verde lima para el botón */
                    border-color: #32CD32;
                    color: #4B0082; /* Texto morado */
                }
                .btn-primary:hover {
                    background-color: #228B22; /* Verde más oscuro al pasar el cursor */
                    border-color: #228B22;
                }
                .form-label {
                    color: #E5E5E5; /* Color claro para etiquetas */
                }
                a {
                    color: #32CD32; /* Verde lima para enlaces */
                }
                a:hover {
                    color: #228B22; /* Verde oscuro para enlaces al pasar el cursor */
                }
            </style>
        </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card p-4 col-md-6">
                    <h2 class="text-center mb-4">Log-IN</h2>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Seu Melhor Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        <div class="text-center mt-3">
                            <p>Não tem uma conta? <a href="/user-off">Cadastre-se AQUI</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </body>
        </html>';
    }

    public function renderCadastro() {
        echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <style>
                body {
                    background-color: #2C3E50;
                }
                .card {
                    background-color: #4B0082;
                    color: #E5E5E5;
                    border: 2px solid #32CD32;
                }
                .btn-primary {
                    background-color: #32CD32;
                    border-color: #32CD32;
                    color: #4B0082;
                }
                .btn-primary:hover {
                    background-color: #228B22;
                    border-color: #228B22;
                }
                .form-label {
                    color: #E5E5E5;
                }
                a {
                    color: #32CD32;
                }
                a:hover {
                    color: #228B22;
                }
            </style>
        </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card p-4 col-md-6">
                    <h2 class="text-center mb-4">Cadastro</h2>
                    <form method="POST" action="/user-off">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Seu Nome Aqui:</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Seu Melhor Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                        <div class="text-center mt-3">
                            <p>Tem uma conta? <a href="/">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </body>
        </html>';
    }

    public function renderSuccess() {
        header('Location: /user-on');
    }

    public function renderError() {
        echo 'Erro ao logar! <p> <a href="/">Tente Novamente</a> </p>';
    }
}
