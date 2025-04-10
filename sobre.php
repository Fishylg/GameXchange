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
    <title>Sobre nós</title>
    <link rel="stylesheet" href="Assets/Css/sobre.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
    <link rel=’shortcut icon’ href=’favicon.ico’ type=’image/x-icon’ />
</head>
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

    <body>
        <main>
            <h1 class="a" style="font-size: 60px; font-weight: bold; padding-top: 80px; text-align: center;">Nosso Site e Nossa História!</h1>
            <h5 style="padding-bottom: 80px; text-align: center;">Nosso PI, nossas dificuldades e nossos aprendizados</h5>
            <section class="historia">
                <h3>O que é o PI, e por que ter escolhido este design?</h3>
                <p>
                    O PI (Projeto Integrador) é uma atividade da nossa instituição de ensino. O PI tem a ideia de ser uma atividade
                    englobando todos os conhecimentos obtidos durante as aulas, assim fazendo um único projeto para demonstrar
                    todas as capacidades desenvolvidas. Nossa escolha pra este tipo de site foi por causa da péssima interface da
                    Steam, e a bonita mas agora bem poluída interface. Então eu, Matheus Guida e o Ryan Germano começamos a fazer
                    o site do zero pensando diretamente no nosso PI.
                </p>
            </section>
        </main>
    </body>
</html>
