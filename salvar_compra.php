<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login1.php');
    exit;
}

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrinho'])) {
    $carrinho = unserialize($_POST['carrinho']);
    $usuario_id = $_SESSION['usuario_id'];

    foreach ($carrinho as $id_jogo) {
        // Insira a lógica para salvar a compra no banco de dados
        $insert = 'INSERT INTO tb_compras (id_usuario, id_jogos, chave_ativacao) VALUES (:usuario_id, :id_jogo, :chave)';
        $stmt = $banco->prepare($insert);
        
        // Gerar uma chave de ativação (exemplo simples)
        $chave = bin2hex(random_bytes(16)); // Gera uma chave aleatória

        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_jogo', $id_jogo, PDO::PARAM_INT);
        $stmt->bindParam(':chave', $chave, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Limpar o carrinho após a compra
    unset($_SESSION['carrinho']);

    // Redirecionar para o perfil
    header('Location: perfil.php');
    exit;
}
?>