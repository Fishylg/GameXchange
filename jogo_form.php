<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header('Location: index.php');
    exit;
}

require_once 'Assets/php/jogo.php';

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
$banco = new PDO($dsn, $user, $password);

$jogo = new Jogo($banco);
$editando = false;

if (isset($_GET['id'])) {
    $jogo->carregar($_GET['id']);
    $editando = true;
}

// lista de jogos
$listaJogos = $banco->query("SELECT id_jogos, nome FROM tb_jogos ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);

$usuario_logado = isset($_SESSION['usuario_nome_perfil']) ? $_SESSION['usuario_nome_perfil'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jogo->nome = $_POST['nome'];
    $jogo->nota = $_POST['nota'];
    $jogo->preco = $_POST['preco'];
    $jogo->data_lancamento = $_POST['data_lancamento'];
    $jogo->descricao = $_POST['descricao'];
    $jogo->classificacao_indicativa = $_POST['classificacao'];

    // banner
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
        $destBanner = 'Assets/Img/banners/' . strtolower(preg_replace('/[^a-z0-9]/', '-', $jogo->nome)) . '.png';
        move_uploaded_file($_FILES['banner']['tmp_name'], $destBanner);
        $jogo->banner = basename($destBanner);
    } elseif (!$editando) {
        $jogo->banner = null;
    }

    // fotos 0-4
    for ($i = 0; $i <= 4; $i++) {
        $inputName = "foto$i";
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES[$inputName]['name'], PATHINFO_FILENAME);
            $dest = 'Assets/Img/vendas/' . $ext . '.png';
            move_uploaded_file($_FILES[$inputName]['tmp_name'], $dest);
            $jogo->fotos[$i] = basename($dest);
        } elseif ($editando && isset($jogo->fotos[$i])) {
            // mantém imagem antiga
        } else {
            $jogo->fotos[$i] = null;
        }
    }

    if ($editando) {
        $jogo->id = $_GET['id'];
        $jogo->atualizar();
    } else {
        $jogo->salvar();
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $editando ? 'Editar' : 'Novo' ?> Jogo</title>
    <link rel="stylesheet" href="./Assets/Css/style.css">
    <style>
        body {
            background: #181220;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        main {
            margin-top: 100px;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            width: 100%;
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: none;
            margin-top: 5px;
        }

        button {
            padding: 10px 20px;
            background: #5ee0c3;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        select {
            margin-left: 10px;
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
    <div class="container">
        <h1 style="text-align: center;"><?= $editando ? 'Editar' : 'Criar' ?> Jogo</h1>

        <form method="GET" style="margin-bottom: 30px; text-align: center;">
            <label for="id">Selecionar jogo:</label>
            <select name="id" id="id" onchange="this.form.submit()">
                <option value="">-- Novo Jogo --</option>
                <?php foreach ($listaJogos as $item): ?>
                    <option value="<?= $item['id_jogos'] ?>" <?= isset($_GET['id']) && $_GET['id'] == $item['id_jogos'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($item['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <form method="POST" enctype="multipart/form-data">
            <label>Nome:
                <input type="text" name="nome" value="<?= htmlspecialchars($jogo->nome ?? '') ?>" required>
            </label>

            <label>Nota:
                <input type="number" name="nota" value="<?= htmlspecialchars($jogo->nota ?? '') ?>" required>
            </label>

            <label>Preço:
                <input type="number" name="preco" step="0.01" value="<?= htmlspecialchars($jogo->preco ?? '') ?>" required>
            </label>

            <label>Data de Lançamento:
                <input type="date" name="data_lancamento" value="<?= htmlspecialchars($jogo->data_lancamento ?? '') ?>" required>
            </label>

            <label>Classificação Indicativa:
                <input type="text" name="classificacao" value="<?= htmlspecialchars($jogo->classificacao_indicativa ?? '') ?>" required>
            </label>

            <label>Descrição:
                <textarea name="descricao" rows="6"><?= htmlspecialchars($jogo->descricao ?? '') ?></textarea>
            </label>

            <label>Banner (png):
                <input type="file" name="banner" accept="image/png">
            </label>

            <?php for ($i = 0; $i <= 4; $i++): ?>
                <label>Foto <?= $i ?> (png):
                    <input type="file" name="foto<?= $i ?>" accept="image/png">
                </label>
            <?php endfor; ?>

            <button type="submit">Salvar</button>
        </form>
    </div>
</main>
</body>
</html>
