<?php
session_start();

if (isset($_SESSION['usuario_id'])) { // Se o usuário tentar entrar mesmo logado, ele é redirecionado de volta pro index.php
    header("Location: index.php");
    exit;
}


$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $nome_real = trim($_POST['nome_real']) . ' ' . trim($_POST['sobrenome']); // Junta Nome + Sobrenome
        $nome_perfil = trim($_POST['nome_perfil']);
        $senha = $_POST['senha'];
        $data_nascimento = $_SESSION['data_nascimento'] ?? null;

        if (!$data_nascimento) {
            die("Erro: Data de nascimento não encontrada. Volte para a página anterior.");
        }

        $check_email = $banco->prepare("SELECT email FROM tb_usuario WHERE email = :email");
        $check_email->bindParam(':email', $email);
        $check_email->execute();
        if ($check_email->rowCount() > 0) {
            die("Erro: Este e-mail já está cadastrado.");
        }

        $sql = "INSERT INTO tb_usuario (email, nome_perfil, nome_real, senha, data_nascimento, qtd_jogos, tipo) 
                VALUES (:email, :nome_perfil, :nome_real, :senha, :data_nascimento, 0, 'comum')";
        $dados = $banco->prepare($sql);
        $dados->bindParam(':email', $email);
        $dados->bindParam(':nome_perfil', $nome_perfil);
        $dados->bindParam(':nome_real', $nome_real);
        $dados->bindParam(':senha', $senha);
        $dados->bindParam(':data_nascimento', $data_nascimento);

        if ($dados->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['nome_perfil'] = $nome_perfil;
            $_SESSION['tipo'] = 'comum';

            $_SESSION['recem_cadastrado'] = true;
            header("Location: logado.php");
            exit();
        } else {
            echo "Erro ao criar conta.";
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gameXchange - Criar conta</title>
    <link rel="stylesheet" href="./Assets/Css/login3.css">
    <link rel=’shortcut icon’ href=’favicon.ico’ type=’image/x-icon’ />
    <script src="./Assets/Js/login3.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="text-center mb-6">
                <img src="./Assets/Img/Logo.png" alt="gameXchange logo" class="logo">
            </div>
            <h2 class="subtitle">Criar conta</h2>
            <form method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Endereço de e-mail" class="input-field" required>
                </div>
                <div class="input-group flex">
                    <input type="text" name="nome_real" placeholder="Nome" class="input-field half" required>
                    <input type="text" name="sobrenome" placeholder="Sobrenome" class="input-field half" required>
                </div>
                <div class="input-group relative">
                    <input type="text" name="nome_perfil" placeholder="Nome de exibição" class="input-field" required>
                </div>
                <div class="input password-input">
                    <input type="password" name="senha" placeholder="Criar senha" id="password" required>
                </div>
                <div class="input-group">
                    <label class="checkbox-container">
                        <input type="checkbox" required>
                        <span class="checkbox-text">Confirmo que li e aceito os <a href="#" class="link">Termos de serviço</a>.</span>
                    </label>
                </div>
                <div class="input-group">
                    <label class="checkbox-container">
                        <input type="checkbox">
                        <span class="checkbox-text">Receber novidades e ofertas da GameXchange (opcional)</span>
                    </label>
                </div>
                <button type="submit" class="submit-button">Continuar</button>
            </form>
            <div class="text-center mt-6">
                <p class="footer-text">Já tem uma conta? <a href="./login1.php" class="link">Entrar</a></p>
            </div>
        </div>
    </div>
</body>
</html>