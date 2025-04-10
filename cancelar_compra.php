<?php
session_start();

// Limpa o carrinho
unset($_SESSION['carrinho']);

// Verifica se o carrinho foi limpo
if (!isset($_SESSION['carrinho'])) {
    echo json_encode(['sucesso' => true]);
} else {
    echo json_encode(['erro' => 'Falha ao limpar o carrinho']);
}
?>