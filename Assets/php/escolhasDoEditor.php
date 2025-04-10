<?php
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

$banco = new PDO($dsn, $user, $password);
    
$select = 'SELECT * FROM tb_jogos ORDER BY nota DESC LIMIT 5';
$resultado = $banco->query($select)->fetchAll();
?>
<nav>
    <ul class="escolhasDoEditor">
        <?php foreach($resultado as $lista) { ?> 
        <li>
            <a href="vendas.php?id=<?= $lista['id_jogos'] ?>"> <!-- Adicionando o id na URL -->
                <img src="./Assets/Img/banners/<?= $lista['foto0'] ?>"> 
                <h3><?= $lista['nome'] ?></h3>
                <h4>R$ <?= number_format($lista['preco'], 2, ',', '.') ?></h4>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>
