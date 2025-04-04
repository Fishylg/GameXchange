<?php
session_start();

$dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = 'SELECT * FROM tb_jogos';
$resultado = $banco->query($select)->fetchAll();

// Verifica se o usuário está logado
$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="./Assets/Css/suporte.css">
</head>
<body>
    <?= include './Assets/php/header.php'; ?>
    <main>
        <div class="barra" style="padding-bottom: 40px;"></div>
        <form action="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>
            
            <label for="gravidade">Gravidade:</label>
            <input type="number" id="gravidade" name="gravidade" min="1" max="10" required>
            
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>