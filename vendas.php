<?php
session_start();
$dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; 
    $select = 'SELECT * FROM tb_jogos WHERE id_jogos = :id'; 
    $dados = $banco->prepare($select);
    $dados->bindParam(':id', $id, PDO::PARAM_INT);
    $dados->execute();
    $resultado = $dados->fetchAll();
} 

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!empty($resultado)) { ?> 
        <title><?= htmlspecialchars($resultado[0]['nome']) ?> - gameXchange</title>
    <?php } else { ?>
        <title>Jogo não encontrado - gameXchange</title>
    <?php } ?>
    <link rel="stylesheet" href="Assets/Css/vendas.css">
    <script src="./Assets/Js/vendas.js"></script>
</head>

<body>
    <header>
        <nav class="opcoes1">
            <ul>
                <li><a href="./index.php">Store</a></li>
                <li><a href="./sobre.php">Sobre</a></li>
                <li><a href="./suporte.php">Suporte</a></li>
            </ul>
            <div class="user-menu">
                <?php if ($usuario_logado): ?>
                    <span class="user-text">Olá, <?= htmlspecialchars($usuario_logado) ?></span>
                    <a href="logout.php" class="btn-login logout-btn">Sair</a>
                <?php else: ?>
                    <a href="login1.php" class="btn-login">Entrar</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <?php if (!empty($resultado)) { 
            $jogo = $resultado[0]; // Pega o primeiro resultado
        ?>
        <h1 class="a" style="font-size: 60px; font-weight: bold; padding-left: 30px;"><?= htmlspecialchars($jogo['nome']) ?></h1>
        <br>
        <h1 class="a" style="padding-left: 30px;"><?= htmlspecialchars($jogo['nota']) ?>/100</h1>

        <section class="imagens-principais">
            <div class="main-wrapper">
                <div class="main-image">
                    <img alt="foto principal" class="main-image-img" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" />
                </div>
                <div class="grid-images">
                    <img alt="foto1" class="grid-image" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto1']) ?>" />
                    <img alt="foto2" class="grid-image" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto2']) ?>" />
                    <img alt="foto3" class="grid-image" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto3']) ?>" />
                    <img alt="foto4" class="grid-image" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto4']) ?>" />
                </div>
            </div>

            <h4 style="font-weight: 300; font-size: 37px; font-weight: bold;">R$ <?= htmlspecialchars($jogo['preco']) ?>,00</h4>
        </section>

        <section class="comprar">
            <ul>
                <li>
                    <!-- Aqui é onde atualizei: ao clicar em "comprar agora", vai para finalizar_venda.php levando o id -->
                    <a href="finalizar_venda.php?id=<?= $jogo['id'] ?>">Comprar agora</a>
                    <a href="carrinho.php?id=<?= $jogo['id'] ?>">Colocar no carrinho</a>
                    <a href="lista_desejos.php?id=<?= $jogo['id'] ?>">Lista de desejos</a>
                </li>
            </ul>
        </section>

        <section id="infos">
            <div class="palavras">
                <h3 style="font-size: larger; font-weight: bolder;">Descrição do jogo</h3>
                <br>
                <h4 style="font-weight: 100; font-size: 20px;">
                    <?= nl2br(htmlspecialchars($jogo['descricao'])) ?>
                </h4>
            </div>
        </section>

        <div class="container">
            <div class="carousel-wrapper">
                <h3 style="font-size: large; font-weight: bolder; padding-top: 25px; padding-bottom: 15px;">Você também pode gostar</h3>
                <div class="carousel" id="carousel">
                    <div class="carousel-item">
                        <div class="carousel-image">
                            <img alt="Cover image" src="./Assets/Img/aa (1).png" />
                            <p class="carousel-caption"><?= htmlspecialchars($jogo['nome']) ?></p>
                        </div>
                    </div>
                </div>
                <button class="carousel-button prev" onclick="prevSlide()">&#10094;</button>
                <button class="carousel-button next" onclick="nextSlide()">&#10095;</button>
            </div>
        </div>

        <?php } else { ?>
            <h2 style="padding: 20px;">Jogo não encontrado.</h2>
        <?php } ?>
    </main>
</body>

</html>
