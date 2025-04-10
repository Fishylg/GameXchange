<?php
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

$select = 'SELECT id_jogos, nome, foto0 FROM tb_jogos ORDER BY RAND() LIMIT 6';
$resultado = $banco->query($select)->fetchAll();
?>

<ul class="lista-produtos">
    <?php foreach ($resultado as $jogo): ?>
        <li>
            <a href="vendas.php?id=<?php echo $jogo['id_jogos']; ?>">
                <img src="./Assets/Img/banners/<?php echo ($jogo['foto0']); ?>" alt="<?php echo ($jogo['nome']); ?>">
                <br><?php echo ($jogo['nome']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>