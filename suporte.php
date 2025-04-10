<?php
session_start();

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

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
    <link rel="stylesheet" href="Assets/Css/style.css">
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />

</head>
<body>
    <header>
        <img src="Assets/Img/Logo.png" alt="Logo GameXchange">
        <nav class="opcoes1">
            <ul>
                <li><a href="./index.php">Store</a></li>
                <li><a href="./sobre.php">Sobre</a></li>
                <li><a href="./suporte.php">Suporte</a></li>
            </ul>
            <div class="user-menu">
                <?php if ($usuario_logado): ?>
                    <a href="perfil.php" class="user-text"><?php echo htmlspecialchars($usuario_logado); ?></a>
                    <a href="logout.php" class="btn-login logout-btn">Sair</a>
                <?php else: ?>
                    <a href="login1.php" class="btn-login">Entrar</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    
    <main class="suporte"> 
        <div style="display: flex; justify-content: center; padding-bottom: 40px;">
            <h1>Encontrou algum problema? Nos conte para podermos concertar o mais rápido o possivel!!</h1>
        </div>
        <div class="barra"></div>
        <form action="./form_suporte.php" method="POST" class="form-suporte">
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
