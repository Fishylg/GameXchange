<?php
session_start();

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

try {
    $banco = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Erro ao conectar no banco: ' . $e->getMessage());
}

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Busca informações do usuário
$selectUsuario = 'SELECT nome_perfil, email, tipo, nome_real FROM tb_usuario WHERE id_usuario = :usuario_id';
$stmt = $banco->prepare($selectUsuario);
$stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Busca os jogos que o usuário comprou (com imagem e chave)
$selectJogos = '
    SELECT j.nome, j.foto0, c.chave_ativacao
    FROM tb_compras c
    INNER JOIN tb_jogos j ON c.id_jogos = j.id_jogos
    WHERE c.id_usuario = :usuario_id
';

$stmtJogos = $banco->prepare($selectJogos);
$stmtJogos->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmtJogos->execute();
$jogosComprados = $stmtJogos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil | GamexChange</title>
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #181220;">
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

<main style="padding: 40px;">

    <section class="perfil-informacoes" style="margin-bottom: 40px;">
        <h2 style="margin-bottom:30px; font-size: 50px">Informações Pessoais</h2>
        <p style="margin-bottom:10px; font-size: 25px"><strong>Nome:</strong> <?= htmlspecialchars($usuario['nome_real']); ?></p>
        <p style="margin-bottom:10px; font-size: 25px"><strong>Nickname:</strong> <?= htmlspecialchars($usuario['nome_perfil']); ?></p>

        <div style="margin-bottom: 2rem; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="mostrar-email" style="width: 18px; height: 18px; accent-color: #5ee0c3; cursor: pointer;">
            <label for="mostrar-email" style="font-size: 18px; color: #ccc; cursor: pointer;">Mostrar Email</label>
        </div>

        <p id="email-usuario" style="margin-bottom:5rem; font-size: 25px; display: none;">
            <strong>Email:</strong> <?= htmlspecialchars($usuario['email']); ?>
        </p>

        <?php if ($usuario['tipo'] === 'admin'): ?>
            <p style="margin-bottom:1rem; font-size: 25px">
                <strong>Tipo:</strong> <?= htmlspecialchars($usuario['tipo']); ?>
            </p>

            <!-- Botão editar jogos -->
            <a href="jogo_form.php" style="display: inline-block; background-color: #7d68f1; color: white; padding: 10px 20px; font-size: 16px; border-radius: 8px; text-decoration: none; margin-bottom: 3rem;">
                Cadastrar Jogos
            </a>
        <?php endif; ?>
    </section>

    <section class="perfil-jogos">
        <h2 style="margin-bottom:30px; font-size: 50px">Meus Jogos</h2>
        <?php if (count($jogosComprados) > 0): ?>
            <div class="jogos-grid" style="display: flex; flex-wrap: wrap; gap: 20px;">
                <?php foreach ($jogosComprados as $jogo): ?>
                    <div class="jogo-card" style="background-color: #2c1e4a; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 10px; width: 250px; text-align: center;">
                        <img alt="foto principal" style="height: 200px; width: 100%; object-fit: cover; margin-bottom: 10px; border-radius: 8px;" src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" />
                        <p style="margin-top: 10px; margin-bottom:5px; font-weight: bold;">
                            <?= htmlspecialchars($jogo['nome']); ?>
                        </p>
                        <p style="font-size: 14px; color: #5ee0c3; word-break: break-word; font-family: monospace;">
                            <strong>Chave:</strong> <?= htmlspecialchars($jogo['chave_ativacao']); ?>
                        </p>
                        <button onclick="copiarChave('<?= htmlspecialchars($jogo['chave_ativacao']) ?>')" style="margin-top: 5px; font-size: 13px; background: #3a2c5e; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                            Copiar Chave
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Você ainda não comprou nenhum jogo.</p>
        <?php endif; ?>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('mostrar-email');
        const emailParagrafo = document.getElementById('email-usuario');

        emailParagrafo.style.display = checkbox.checked ? 'block' : 'none';

        checkbox.addEventListener('change', function () {
            emailParagrafo.style.display = this.checked ? 'block' : 'none';
        });
    });

    function copiarChave(chave) {
        navigator.clipboard.writeText(chave).then(function () {
            alert('Chave copiada!');
        }).catch(function (err) {
            alert('Erro ao copiar chave: ' + err);
        });
    }
    </script>
</main>
</body>
</html>
