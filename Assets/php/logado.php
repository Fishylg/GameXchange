<?php
// Definir título da página dinamicamente
$pageTitle = "GameXchange";

// Incluir o cabeçalho, caso tenha necessidade de um arquivo separado para o cabeçalho (por exemplo, "header.php").
// include('header.php');

// Exemplo de código PHP para garantir que o usuário tenha completado a inscrição (poderia vir de um banco de dados, por exemplo)
$usuarioCadastroCompleto = true; // Exemplo, esta variável pode vir de uma lógica de banco de dados.

// Se o cadastro foi completado, exibe a mensagem de confirmação e o botão de login.
if ($usuarioCadastroCompleto) {
    echo '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . htmlspecialchars($pageTitle) . '</title>
            <link rel="stylesheet" href="./Assets/Css/logado.css">
        </head>
        <body>
            <main>
                <div class="logado-container">
                    <div class="logo">
                        <img src="Assets/Img/Logo.png" alt="Logo">
                    </div>
                    <h2>Parabéns!</h2>
                    <h3>Você concluiu o cadastro da sua conta.</h3>
                    <h4>Clique em "Entrar" para logar...</h4>
                    <button class="btn-login" onclick="window.location.href=\'login1.php\'">Entrar</button>
                </div>
            </main>
        </body>
        </html>
    ';
}
?>