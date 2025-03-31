<?php
$dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);
    
$select = 'SELECT * FROM tb_jogos';
$resultado = $banco->query($select)->fetchALL();
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
                <li><a href="./store.php">Store</a></li>
                <li><a href="./sobre.php">Sobre</a></li>
                <li><a href="./suporte.php">Suporte</a></li>
            </ul>
            <button class="login-btn" onclick="window.location.href='login1.php'">Entrar</button>
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
                <li><a href="#">Descobrir</a></li>
                <li><a href="#">Navegar</a></li>
                <li><a href="#">Novidades</a></li>
            </ul>
        </section>
        <section id="carrosel">
            <img src="Assets/Img/Banner_GOW.png" alt="Banner God Of War: Ragnarok">
            <div class="lista_carrosel">
                <ul>
                    <li><img src="Assets/Img/icon_dc.png" alt="Dead Cells">Dead Cells</li>
                    <li><img src="Assets/Img/icon_dg.png" alt="Days Gone">Days Gone</li>
                    <li><img src="Assets/Img/icon_fg.png" alt="Fall Guys">Fall Guys</li>
                    <li><img src="Assets/Img/icon_fm7.png" alt="Forza Motorsport 7">Forza Motorsport 7</li>
                    <li><img src="Assets/Img/icon_mc.png" alt="Minecraft">Minecraft</li>
                    <li><img src="Assets/Img/icon_fn.png" alt="Fortnite">Fortnite</li>
                </ul>
            </div>
        </section>
        <section class="mais_vendidos">
            <ul>
                <li><a href="#">Mais vendidos</a></li>
            </ul>
        </section>
        <section class="vendidos">
            <?php include './Assets/php/vendidos.php'; ?>
        </section>
    </main>
    <footer>
        <h5>© 2024, GameXchange, Inc. Todos os direitos reservados. Xchange, GameX, o logotipo da GameXchange são marcas comerciais ou registradas da GameXchange, Inc. nos Estados Unidos da América e em outros lugares. Outras marcas e nomes de produtos são marcas registradas de seus respectivos donos.   Nossos sites podem conter links para outros sites e recursos fornecidos por terceiros. Esses links são fornecidos apenas para a sua conveniência. A GameXchange não tem controle sobre o conteúdo desses sites ou recursos e não aceita nenhuma responsabilidade por eles ou por qualquer perda ou dano que possa resultar de seu uso.  </h5>
        <a href="https://www.facebook.com/"><img src="Assets/Img/fbIcon.png" alt="Facebook"></a>
        <a href="https://www.x.com/"><img src="Assets/Img/xIcon.png" alt="Twitter"></a>
        <a href="https://www.youtube.com/"><img src="Assets/Img/ytIcon.png" alt="Youtube"></a>
    </footer>
</body>
</html>