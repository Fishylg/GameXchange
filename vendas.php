<?php
session_start();

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$select = 'SELECT * FROM tb_jogos WHERE id_jogos = :id';
$dados = $banco->prepare($select);
$dados->bindParam(':id', $id, PDO::PARAM_INT);
$dados->execute();
$resultado = $dados->fetch(PDO::FETCH_ASSOC);

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;

// Adiciona o jogo ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_jogo'])) {
    $id_jogo = intval($_POST['id_jogo']);
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    if (!in_array($id_jogo, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = $id_jogo;
    }
    // REDIRECIONA pro carrinho depois de adicionar
    header('Location: carrinho.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!empty($resultado)) { ?>
        <title><?= htmlspecialchars($resultado['nome']) ?> - gameXchange</title>
    <?php } else { ?>
        <title>Jogo não encontrado - gameXchange</title>
    <?php } ?>
    <link rel="stylesheet" href="Assets/Css/vendas.css">
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
                    <a href="perfil.php" class="user-text" style="font-size: 16px;"><?php echo htmlspecialchars($usuario_logado); ?></a>
                    <a href="logout.php" class="btn-login logout-btn" style="font-size: 16px;">Sair</a>
                <?php else: ?>
                    <a href="login1.php" class="btn-login">Entrar</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        <?php if (!empty($resultado)) {
            $jogo = $resultado;
        ?>
            <h1 class="a" style="font-size: 60px; font-weight: bold; padding-left: 30px; margin-bottom:-2rem;"><?= htmlspecialchars($jogo['nome']) ?></h1>
            <br>
            <h1 class="a" style="padding-left: 30px; margin-bottom:3rem;">Nota: <?= htmlspecialchars($jogo['nota']) ?>/100</h1>
            <h6 class="a" style="font-weight:300; margin-left:15rem; font-size: 20px; font-weight: bold; padding-top: 10px;">Data de lançamento: <?= htmlspecialchars($jogo['data_lancamento']) ?></h6>
            <h6 class="a" style="font-weight:300; margin-left:15rem; font-size: 20px; font-weight: bold; padding-top: 10px;">Classificação indicativa: <?= htmlspecialchars($jogo['classificacao_indicativa']) ?></h6>

            <section class="imagens-principais">
                <div class="main-wrapper">
                    <div class="main-image">
                        <img alt="foto principal" class="main-image-img" style="height: 31rem; width: 30rem;" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" />
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

            <section class="comprar" style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 3rem;">
                <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                    <li>
                        <a href="finalizar_venda.php?id=<?= $jogo['id_jogos'] ?>" style="border: 2px solid black; text-decoration: none; padding: 10px; border-radius: 8px; width: 372px; height: 45px; display: flex; justify-content: center; align-items: center;">Comprar agora</a>
                    </li>
                    <li>
                        <form action="vendas.php" method="post">
                            <input type="hidden" name="id_jogo" value="<?= $jogo['id_jogos'] ?>">
                            <button type="submit" 
                                style="cursor: pointer; border: 2px solid black; font-size: 16px; background-color: #6300aa; color:white; text-decoration: none; padding: 10px; border-radius: 8px; width: 372px; height: 45px; display: flex; justify-content: center; align-items: center;"
                                onmouseover="this.style.backgroundColor='#48156d';" 
                                onmouseout="this.style.backgroundColor='#6300aa';">
                                Adicionar ao Carrinho
                            </button>
                        </form>
                    </li>
                    <?php if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin'): ?>
                    <li>
                        <a href="jogo_form.php?id=<?= $jogo['id_jogos'] ?>" style="border: 2px solid black; color: whitesmoke; text-decoration: none; padding: 10px; border-radius: 8px; width: 372px; height: 45px; display: flex; justify-content: center; align-items: center;">Editar</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </section>

            <section id="infos">
                <div class="palavras">
                    <h3 style="font-size: larger; margin-left:8rem; font-weight: bolder;">Descrição do jogo</h3>
                    <br>
                    <h4 style="font-weight: 100; margin-left:8rem; font-size: 20px;">
                        <?= nl2br(htmlspecialchars($jogo['descricao'])) ?>
                    </h4>
                </div>
            </section>

            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
                <div class="carousel-wrapper" style="margin-left:-5rem;">
                    <h3 style="font-size: large; font-weight: bolder; padding-top: 25px; padding-bottom: 15px; margin-left:5.5rem;">Você também pode gostar</h3>
                    <div class="carousel" id="carousel" style="display: flex; gap: 2rem; overflow-x: hidden; padding: 1rem 0; margin-left: 5rem;">

                        <?php
                        $select_carrossel = 'SELECT * FROM tb_jogos WHERE id_jogos != :id_atual ORDER BY RAND() LIMIT 5';
                        $dados_carrossel = $banco->prepare($select_carrossel);
                        $dados_carrossel->bindParam(':id_atual', $id, PDO::PARAM_INT);
                        $dados_carrossel->execute();
                        $jogos_carrossel = $dados_carrossel->fetchAll();

                        foreach ($jogos_carrossel as $jogo_carrossel) {
                        ?>
                            <div class="carousel-item" style="background-color: #2c1e4a; border-radius: 10px; padding: 10px; min-width: 200px; text-align: center; transition: transform 0.3s, background-color 0.3s;"
                                onmouseover="this.style.transform='scale(1.05)'; this.style.backgroundColor='#3d2e60';"
                                onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='#2c1e4a';">
                                <a href="vendas.php?id=<?= $jogo_carrossel['id_jogos'] ?>" style="text-decoration: none; color: inherit;">
                                    <img src="./Assets/Img/vendas/<?= htmlspecialchars($jogo_carrossel['foto0']) ?>" alt="<?= htmlspecialchars($jogo_carrossel['nome']) ?>" style="width: 180px; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; display: block;">
                                    <p style="font-size: 1rem; font-weight: bold; color: #fff; margin-top: 0.5rem;"><?= htmlspecialchars($jogo_carrossel['nome']) ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h1 style="text-align: center; margin-top: 50px;">Jogo não encontrado.</h1>
        <?php } ?>
    </main>
</body>
</html>