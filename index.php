<?php
session_start();
var_dump($_SESSION);

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
    <title>GameXchange</title>
    <link rel="stylesheet" href="Assets/Css/style.css">
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
                    <span class="user-text">Olá, <?php echo htmlspecialchars($usuario_logado); ?></span>
                    <a href="logout.php" class="btn-login logout-btn">Sair</a>
                <?php else: ?>
                    <a href="login1.php" class="btn-login">Entrar</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        <section id="descobrir">
            <div class="search-container">
                <input type="text" placeholder="Pesquisar na loja...">
                <button class="search-button">
                    <img src="Assets/Img/lupa.png" alt="Buscar">
                </button>
            </div>
            <ul>
                <li><a href="#mais_vendidos">Mais vendidos</a></li>
                <li><a href="#">Escolhas do editor</a></li>
                <li><a href="#">Lançamentos</a></li>
            </ul>
        </section>
        <section id="carrosel">
            <img src="Assets/Img/Banner_GOW.png" alt="Banner God Of War: Ragnarok">
            <div class="lista_carrosel">
                <?php include './Assets/php/lista_produtos.php'; ?>
            </div>
        </section>
        <section id="mais_vendidos">
            <ul>
                <li><a href="#">Mais vendidos</a></li>
            </ul>
        </section>
        <section class="vendidos">
            <?php include './Assets/php/vendidos.php'; ?>
        </section>
    </main>
    <footer>
        <h5>© 2024, GameXchange, Inc. Todos os direitos reservados...</h5>
        <a href="https://www.facebook.com/"><img src="Assets/Img/fbIcon.png" alt="Facebook"></a>
        <a href="https://www.x.com/"><img src="Assets/Img/xIcon.png" alt="Twitter"></a>
        <a href="https://www.youtube.com/"><img src="Assets/Img/ytIcon.png" alt="Youtube"></a>
    </footer>
</body>
</html>
