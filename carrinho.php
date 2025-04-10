<?php
session_start();

// Conexão com o banco de dados
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
}

// Recupera o carrinho da sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

$lista_jogos = [];

if (!empty($carrinho)) {
    $placeholders = implode(',', array_fill(0, count($carrinho), '?'));
    $query = "SELECT * FROM tb_jogos WHERE id_jogos IN ($placeholders)";
    $stmt = $banco->prepare($query);
    $stmt->execute($carrinho);
    $lista_jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Carrinho - gameXchange</title>
    <link rel="stylesheet" href="Assets/Css/carrinho.css">
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
                    <a href="perfil.php" class="user-text"><?php echo htmlspecialchars($usuario_logado); ?></a>
                    <a href="logout.php" class="btn-login logout-btn">Sair</a>
                <?php else: ?>
                    <a href="login1.php" class="btn-login">Entrar</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

<main>
    <h1 style="padding: 20px; margin-left:1rem;">Seu Carrinho</h1>

    <?php if (empty($lista_jogos)): ?>
        <p style="padding: 20px; margin-left:1rem;">Seu carrinho está vazio.</p>
    <?php else: ?>
        <div class="carrinho-itens">
            <?php foreach ($lista_jogos as $jogo): ?>
                <div class="item-carrinho" style="padding: 10px; border-bottom: 1px solid #ccc; margin-left:1.5rem;">
                    <img src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" alt="Imagem do jogo" style="width: 150px; height: 150px; margin-bottom:0.5rem;">
                    <h2 style="margin-bottom:0.3rem;"><?= htmlspecialchars($jogo['nome']) ?></h2>
                    <p style="margin-bottom:0.2rem;">Nota: <?= htmlspecialchars($jogo['nota']) ?>/100</p>
                    <p>Classificação: <?= htmlspecialchars($jogo['classificacao_indicativa']) ?></p>
                    <div style="margin-top: 1rem;">
                        <form action="finalizar_venda.php" method="get">
                            <input type="hidden" name="id" value="<?= $jogo['id_jogos'] ?>">
                            <button type="submit" style="padding: 8px 16px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Comprar este jogo
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Botões de Ações -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" style="display: inline-block; padding: 10px 20px; background-color: #007bff; border: none; color: white; font-size: 18px; cursor: pointer; border-radius: 5px; text-decoration: none; margin-right: 10px;">
                Continuar Comprando...
            </a>

            <a href="finalizar_venda_jogos.php" style="display: inline-block; padding: 10px 20px; background-color: #28a745; border: none; color: white; font-size: 18px; cursor: pointer; border-radius: 5px; text-decoration: none;">
                Finalizar Compra
            </a>
        </div>
    <?php endif; ?>
</main>

</body>
</html>
