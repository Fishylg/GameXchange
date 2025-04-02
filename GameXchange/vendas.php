<?php
session_start();
$dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; 
    $select = 'SELECT * FROM tb_jogos WHERE id = :id'; 
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
    <?php foreach($resultado as $lista) { ?> 
    <title><?= $lista ['nome'] ?> - gameXchange</title>
    <?php } ?>
    <link rel="stylesheet" href="Assets/Css/vendas.css">
    <script src="./Assets/Js/vendas.js"></script>
</head>
<body>
    <header>
        <nav class="opcoes1">
            <ul>
                <li><a href="./store.php">Store</a></li>
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
        <?php foreach($resultado as $lista) { ?> 
        <h1 class="a" style="font-size: 60px; font-weight: bold; padding-left: 30px;"><?= $lista ['nome'] ?></h1>
        <br>
        <h1 class="a" style="padding-left: 30px;"><?= $lista ['nota'] ?>/100</h1>
        <?php } ?>
        <section class="imagens-principais">
            <div class="main-wrapper">
                <div class="main-image">
                    <img alt="Close-up of a person's eyes with a serious expression, partially covered by a black mask. Text: Smuggler's Run"
                        class="main-image-img"
                        src="https://storage.googleapis.com/a1aa/image/MeWbDh5X8Zu49NdzjGCFR8djAI78sSAl9rxak8wVzb8.jpg" />
                </div>
                <div class="grid-images">
                    <img alt="Off-road vehicle driving through a desert landscape with mountains in the background"
                        class="grid-image"
                        src="https://storage.googleapis.com/a1aa/image/rEqznnCggsME4fP6V-ufCpbVabYuvN-F4AphhXyFvC0.jpg" />
                    <img alt="Two off-road vehicles parked in front of a house in a rural area" class="grid-image"
                        src="https://storage.googleapis.com/a1aa/image/9F1pY9-UAIXLZrKKRSgm3pDEM5SCPMX-wtAkorDNMnQ.jpg" />
                    <img alt="Off-road vehicle driving through a canyon with rocky walls" class="grid-image"
                        src="https://storage.googleapis.com/a1aa/image/y6_ptbUaDplie_yfdAjutSyxS4dxgrNGcfZ7JAEUnnA.jpg" />
                    <img alt="Off-road vehicle driving up a steep hill in a desert landscape" class="grid-image"
                        src="https://storage.googleapis.com/a1aa/image/47hF0ZXqZHw_RXmt8ahtO6WYtu7ZLCHJnzlTp4hGER4.jpg" />
                </div>
            </div>
            <?php foreach($resultado as $lista) { ?> 
            <h4 style="font-weight:300; font-size: 37px; font-weight: bold;">R$ <?= $lista ['preco'] ?>,00</h4>
            <?php } ?>
        </section>
        <section class="comprar">
            <ul>
                <li>
                    <a href="login1.html">Comprar agora</a>
                    <a href="login1.html">Colocar no carrinho</a>
                    <a href="login1.html">Lista de desejos</a>
                </li>
            </ul>
        </section>

        <section id="infos">
            <div class="palavras">
                <h3 style="font-size: larger; font-weight: bolder;">Descrição do jogo</h3>
                <br>
                <?php foreach($resultado as $lista) { ?> 
                <h4 style="font-weight: 100; font-size: 20px;">
                    <?= $lista['descricao'] ?>
                </h4>
                <?php } ?>
            </div>
        </section>
        <div class="container">
            <div class="carousel-wrapper">
                <h3 style="font-size: large; font-weight: bolder; padding-top: 25px; padding-bottom: 15px;">Você também
                    pode gostar PHP</h3>
                <?php foreach($resultado as $lista) { ?> 
                <div class="carousel" id="carousel">
                    <div class="carousel-item">
                        <div class="carousel-image">
                            <img alt="Cover image of Grand Theft Auto V" src="./Assets/Img/aa (1).png" />
                            <p class="carousel-caption"><?= $lista ['nome']?></p>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <button class="carousel-button prev" onclick="prevSlide()">&#10094;</button>
                <button class="carousel-button next" onclick="nextSlide()">&#10095;</button>
            </div>
        </div>
    </main>
    <footer>
        <h5>© 2024, GameXchange, Inc. Todos os direitos reservados. Xchange, GameX, o logotipo da GameXchange são marcas comerciais ou registradas da GameXchange, Inc. nos Estados Unidos da América e em outros lugares. Outras marcas e nomes de produtos são marcas registradas de seus respectivos donos.   Nossos sites podem conter links para outros sites e recursos fornecidos por terceiros. Esses links são fornecidos apenas para a sua conveniência. A GameXchange não tem controle sobre o conteúdo desses sites ou recursos e não aceita nenhuma responsabilidade por eles ou por qualquer perda ou dano que possa resultar de seu uso.  </h5>
        <a href="https://www.facebook.com/"><img src="Assets/Img/fbIcon.png" alt="Facebook"></a>
        <a href="https://www.x.com/"><img src="Assets/Img/xIcon.png" alt="Twitter"></a>
        <a href="https://www.youtube.com/"><img src="Assets/Img/ytIcon.png" alt="Youtube"></a>
    </footer>
</body>
</html>