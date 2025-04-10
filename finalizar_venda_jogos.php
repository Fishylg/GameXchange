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
$totalCompra = 0; // variável para guardar o total

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
    <title>Finalizar Compra - gameXchange</title>
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
    <h1 style="padding: 20px;">Resumo da sua compra</h1>

    <?php if (empty($lista_jogos)): ?>
        <p style="padding: 20px;">Nenhum jogo no carrinho para finalizar.</p>
    <?php else: ?>
        <div class="carrinho-itens" style="margin-left: 1rem;">
            <?php foreach ($lista_jogos as $jogo): ?>
                <div class="item-carrinho" style="padding: 10px; border-bottom: 1px solid #ccc;">
                    <img src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" alt="Imagem do jogo" style="width: 150px; height: 150px;">
                    <h2 style="margin-top:1rem; margin-bottom:0.5rem;"><?= htmlspecialchars($jogo['nome']) ?></h2>
                    <p style="margin-bottom:0.3rem;">Nota: <?= htmlspecialchars($jogo['nota']) ?>/100</p>
                    <p style="margin-bottom:0.3rem;">Classificação: <?= htmlspecialchars($jogo['classificacao_indicativa']) ?></p>
                    <p>Preço: <strong style="color:green;">R$<?= number_format($jogo['preco'], 2, ',', '.') ?></strong></p>
                </div>
                <?php $totalCompra += $jogo['preco']; ?>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
    <h2 style="margin-bottom:1rem;">Total da Compra: <span style="color: green;">R$ <?= number_format($totalCompra, 2, ',', '.') ?></span></h2>

    
    <form action="salvar_compra.php" method="post">
        <a href="index.php" style="display: inline-block; padding: 10px 20px; background-color: #007bff; border: none; color: white; font-size: 18px; cursor: pointer; border-radius: 5px; text-decoration: none; margin: 10px;">
        Voltar para a loja
    </a>
        <input type="hidden" name="carrinho" value="<?= htmlspecialchars(serialize($carrinho)) ?>">
        <button type="submit" style="display: inline-block; padding: 10px 20px; background-color: green; border: none; color: white; font-size: 18px; cursor: pointer; border-radius: 5px; text-decoration: none; margin: 10px;">
            Ver meus jogos
        </button>
    </form>
</div>
    <?php endif; ?>
</main>

</body>
</html>
