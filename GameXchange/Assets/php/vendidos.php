<?php
$dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);
    
$select = 'SELECT * FROM tb_jogos LIMIT 5';
$resultado = $banco->query($select)->fetchAll();
?>
<nav>
    <ul class="vendidos">
        <?php foreach($resultado as $lista) { ?> 
        <li>
            <a href="vendas.php?id=<?= $lista['id'] ?>"> <!-- Adicionando o id na URL -->
                <img src="./Assets/Img/banners/<?= $lista['foto'] ?>"> 
                <h3><?= $lista['nome'] ?></h3>
                <h4>R$ <?= number_format($lista['preco'], 2, ',', '.') ?></h4>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>
