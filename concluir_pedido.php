<?php
include('protect.php');
include('conexao.php');

// Verifica se o ID do jogo foi passado pela URL
if (!isset($_GET['id'])) {
    echo "ID do jogo não fornecido.";
    exit();
}

$id_jogo = intval($_GET['id']); // pega o id e protege convertendo pra inteiro

// Busca as informações do jogo no banco de dados
$sql = "SELECT * FROM jogos WHERE id_jogos = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id_jogo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    echo "Jogo não encontrado.";
    exit();
}

$jogo = $resultado->fetch_assoc();

// Informações do usuário
$id_usuario = $_SESSION['id']; // pegando o id do usuário logado
$sql_usuario = "SELECT * FROM usuarios WHERE id = ?";
$stmt_usuario = $mysqli->prepare($sql_usuario);
$stmt_usuario->bind_param("i", $id_usuario);
$stmt_usuario->execute();
$resultado_usuario = $stmt_usuario->get_result();
$usuario = $resultado_usuario->fetch_assoc();

// Tratamento da compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $pagamento = $_POST['pagamento'];

    // Inserir os dados no banco de dados
    $stmt = $mysqli->prepare("INSERT INTO vendas (nome_completo, email, telefone, pagamento, id_usuario, id_jogo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $nome_completo, $email, $telefone, $pagamento, $id_usuario, $id_jogo);

    if ($stmt->execute()) {
        echo "<script>alert('Compra realizada com sucesso!'); window.location.href='meus_pedidos.php';</script>";
        exit();
    } else {
        echo "Erro ao processar a compra: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra - <?= htmlspecialchars($jogo['nome']) ?></title>
</head>
<body>

<h1>Finalizar Compra: <?= htmlspecialchars($jogo['nome']) ?></h1>

<form method="POST" action="">
    <label for="nome_completo">Nome completo:</label><br>
    <input type="text" id="nome_completo" name="nome_completo" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" required><br><br>

    <label for="pagamento">Forma de pagamento:</label><br>
    <select id="pagamento" name="pagamento" required>
        <option value="">Selecione</option>
        <option value="Pix">Pix</option>
        <option value="Boleto">Boleto</option>
        <option value="Cartão de Crédito">Cartão de Crédito</option>
    </select><br><br>

    <button type="submit">Finalizar Compra</button>
</form>

</body>
</html>
