<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login1.php');
    exit;
}

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

$banco = new PDO($dsn, $user, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $total = $_POST['total'];
    $usuario_id = $_SESSION['usuario_id'];
    $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

    // Inserir compra na tabela de compras
    $insertCompra = 'INSERT INTO tb_compras (usuario_id, total) VALUES (:usuario_id, :total)';
    $stmt = $banco->prepare($insertCompra);
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':total', $total);
    $stmt->execute();

    // Obter o ID da compra
    $compra_id = $banco->lastInsertId();

    // Inserir jogos comprados na tabela de detalhes da compra
    foreach ($carrinho as $jogo_id) {
        $insertDetalhe = 'INSERT INTO tb_detalhes_compra (compra_id, jogo_id) VALUES (:compra_id, :jogo_id)';
        $stmtDetalhe = $banco->prepare($insertDetalhe);
        $stmtDetalhe->bindParam(':compra_id', $compra_id);
        $stmtDetalhe->bindParam(':jogo_id', $jogo_id);
        $stmtDetalhe->execute();
    }

    // Limpar o carrinho
    unset($_SESSION['carrinho']);

    header('Location: perfil.php?compra_id=' . $compra_id);
    exit;
}