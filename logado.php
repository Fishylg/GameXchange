<?php
session_start();

if (isset($_SESSION['usuario_id'])) { // Se o usuário tentar entrar mesmo logado, ele é redirecionado de volta pro index.php
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['recem_cadastrado'])) {
    header("Location: index.php");
    exit;
}

unset($_SESSION['recem_cadastrado']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameXchange</title>
    <link rel="stylesheet" href="./Assets/Css/logado.css">
    <link rel=’shortcut icon’ href=’favicon.ico’ type=’image/x-icon’ />
</head>
<body>
    <main>
        <div class="logado-container">
            <div class="logo"><img src="Assets/Img/Logo.png" alt="Logo"></div>
            <h2>Parabéns!</h2>
            <h3>Você concluiu o cadastro da sua conta.</h3>
            <h4>Clique em "Entrar" para logar...</h3>
            <button class="btn-login" onclick="window.location.href='login1.php'">Entrar</button>
        </div>
    </main>
</body>
</html>