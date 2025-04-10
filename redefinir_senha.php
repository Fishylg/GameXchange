<?php
session_start();

// Configurações do banco de dados
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

try {
    $banco = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

$mensagem = "";
$sucesso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nova_senha = $_POST['nova_senha'];

    $update = 'UPDATE tb_usuario SET senha = :nova_senha WHERE email = :email';
    $stmt = $banco->prepare($update);
    $stmt->bindParam(':nova_senha', $nova_senha);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $mensagem = "Senha alterada com sucesso!";
        $sucesso = true;
    } else {
        $mensagem = "Erro ao redefinir a senha. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="./Assets/Css/login1.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main>
        <div class="login1-container">
            <div class="logo"><img src="Assets/Img/Logo.png" alt="Logo"></div>
            <h2>Redefinir Senha</h2>
            <form action="redefinir_senha.php" method="POST">
                <div class="input">
                    <input type="email" name="email" placeholder="Seu e-mail" required>
                </div>
                <div class="input">
                    <input type="password" name="nova_senha" placeholder="Nova senha" required>
                </div>
                <button type="submit" class="btn-login">Redefinir Senha</button>
            </form>
        </div>
    </main>

<?php if (!empty($mensagem)): ?>
<script>
    Swal.fire({
        icon: '<?php echo $sucesso ? "success" : "error"; ?>',
        title: '<?php echo $sucesso ? "Sucesso!" : "Erro!"; ?>',
        text: '<?php echo $mensagem; ?>',
        background: '#2c003e', // cor de fundo roxo escuro
        color: '#ffffff', // cor do texto branco
        confirmButtonColor: '#8e24aa',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php echo $sucesso ? "login1.php" : "esqueci_senha.php"; ?>';
        }
    });
</script>
<?php endif; ?>
</body>
</html>
