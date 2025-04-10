<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['erro' => 'Usuário não logado']);
    exit;
}

if (!isset($_POST['id_jogo'])) {
    echo json_encode(['erro' => 'ID do jogo não enviado']);
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$id_jogo = (int) $_POST['id_jogo'];
$data_compra = date('Y-m-d H:i:s');
$chave_ativacao = strtoupper(bin2hex(random_bytes(8))); // Ex: 4F7A2C98B1D3E4F0

// Conexão
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
$banco = new PDO($dsn, $user, $password);

// Inserção
$sql = "INSERT INTO tb_compras (id_usuario, id_jogos, chave_ativacao, data_compra)
        VALUES (:id_usuario, :id_jogos, :chave, :data)";
$dados = $banco->prepare($sql);
$dados->execute([
    ':id_usuario' => $id_usuario,
    ':id_jogos' => $id_jogo,
    ':chave' => $chave_ativacao,
    ':data' => $data_compra
]);

echo json_encode(['sucesso' => true, 'chave' => $chave_ativacao]);

// Após a compra ser confirmada
unset($_SESSION['carrinho']); // Limpa o carrinho
?>