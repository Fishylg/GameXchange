<?php
session_start();

// Configurações do banco de dados
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

$mensagem = "";

try {
    $banco = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verificar se o email existe
    $select = 'SELECT * FROM tb_usuario WHERE email = :email';
    $stmt = $banco->prepare($select);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Se existir, salva o ID do usuário na sessão e manda pra redefinir_senha.php
        $_SESSION['usuario_recuperacao_id'] = $usuario['id_usuario'];
        header("Location: redefinir_senha.php");
        exit;
    } else {
        $mensagem = "E-mail não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci minha senha</title>
    <link rel="stylesheet" href="./Assets/Css/login1.css">
</head>
<body>
    <main>
        <div class="login1-container">
            <h2>Recuperar Senha</h2>
            <?php if ($mensagem) { echo "<p style='color:red;'>$mensagem</p>"; } ?>
            <form action="esqueci_senha.php" method="POST">
                <div class="input">
                    <input type="email" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <button type="submit" class="btn-login">Enviar</button>
                <a href="login1.php" style="display:block;margin-top:10px;">Voltar para o login</a>
            </form>
        </div>
    </main>
</body>
</html>
