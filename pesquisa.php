<?php
session_start();
require_once 'Assets/php/Pesquisa.php';

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;
$termo = isset($_GET['q']) ? trim($_GET['q']) : '';
$pesquisa = new Pesquisa();
$resultados = [];

if ($termo) {
    $resultados = $pesquisa->buscarJogos($termo);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="Assets/Css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #181220;
        }

        main {
            padding: 2rem;
        }

        h1 {
            margin-left: 6.5rem;
            margin-bottom: 3rem;
            color: #fff;
        }

        .lista_resultados {
            display: grid;
            align-items: center;
            grid-template-columns: repeat(auto-fit, 250px);
            gap: 1rem;
            justify-content: center;
            /* mudar pra justify-content */
        }

        /* Cada jogo agora é individual no seu quadradinho roxo */
        .jogo {
            background-color: #2c1e4a;
            border-radius: 20px;
            padding: 1rem;
            width: 250px;
            /* tamanho fixo certinho */
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .jogo:hover {
            transform: translateY(-5px);
        }

        .jogo a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .jogo img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 15px;
        }

        .jogo h2 {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #fff;
            text-align: center;
        }

        .jogo p {
            margin: 0.5rem 0;
            color: #ccc;
            font-size: 0.95rem;
            text-align: center;
        }
    </style>
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

    <main>
        <h1 style="margin-bottom:3.5rem">Resultados da Pesquisa por "<?php echo htmlspecialchars($termo); ?>"</h1>

        <?php if (count($resultados) > 0): ?>
            <div class="area-roxa">
                <div class="lista_resultados">
                    <?php foreach ($resultados as $jogo): ?>
                        <div class="jogo">
                            <a href="vendas.php?id=<?= urlencode($jogo['id_jogos']); ?>">
                                <img src="./Assets/Img/banners/<?= htmlspecialchars($jogo['foto0'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($jogo['nome'], ENT_QUOTES, 'UTF-8'); ?>">
                                <h2><?= htmlspecialchars($jogo['nome'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                <p><?= nl2br(htmlspecialchars($jogo['descricao'], ENT_QUOTES, 'UTF-8')); ?></p>
                                <p class="preco" style="color: green; font-size:20px;">R$ <?= number_format((float) $jogo['preco'], 2, ',', '.'); ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <p style="margin-left: 6.5rem; color: #fff;">Nenhum jogo encontrado.</p>
        <?php endif; ?>
    </main>
</body>

</html>