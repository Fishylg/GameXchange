<?php
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
$banco = new PDO($dsn, $user, $password);

header('Content-Type: application/json');

if (!isset($_GET['cupom'])) {
    echo json_encode(['erro' => 'Cupom não enviado']);
    exit;
}

$cupom = $_GET['cupom'];

$sql = "SELECT desconto FROM tb_cupom WHERE nome_cupom = :cupom LIMIT 1";
$dados = $banco->prepare($sql);
$dados->bindParam(':cupom', $cupom);
$dados->execute();

if ($dados->rowCount() > 0) {
    $desconto = $dados->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['desconto' => (int)$desconto['desconto']]);
} else {
    echo json_encode(['desconto' => 0]);
}
