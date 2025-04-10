<?php
session_start(); // Iniciar a sessão

if (isset($_SESSION['usuario_id'])) { // Se o usuário tentar entrar mesmo logado, ele é redirecionado de volta pro index.php
    header("Location: index.php");
    exit;
}

// Configurações do banco de dados
$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';

$erro = "";

try {
    // Conectar ao banco de dados
    $banco = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta para verificar o usuário e a senha
    $select = 'SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha';
    $dados = $banco->prepare($select);
    $dados->bindParam(':email', $email);
    $dados->bindParam(':senha', $senha);
    $dados->execute();

    // Verificar se a consulta retornou um resultado
    $usuario = $dados->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Se o login for bem-sucedido, armazena os dados do usuário na sessão
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        $_SESSION['usuario_nome_perfil'] = $usuario['nome_perfil'];
        $_SESSION['usuario_nome_real'] = $usuario['nome_real'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_tipo'] = $usuario['tipo']; // Adicionando o tipo (admin ou comum)

        // Redireciona o usuário para a página principal
        header("Location: index.php");
        exit;
    } else {
        // Caso as senhas estejam erradas, exibe uma mensagem
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameXchange</title>
    <link rel="stylesheet" href="./Assets/Css/login1.css">
    <link rel=’shortcut icon’ href=’favicon.ico’ type=’image/x-icon’ />
    <script src="./Assets/Js/login1.js"></script>
</head>
<body>
    <main>
        <div class="login1-container">
            <div class="logo"><img src="Assets/Img/Logo.png" alt="Logo"></div>
            <h2>Entrar</h2>
            <form action="login1.php" method="POST">
                <div class="input">
                    <input type="email" name="email" placeholder="Endereço de e-mail" required>
                </div>
                <div class="input password-input">
                    <input type="password" name="senha" placeholder="Senha" id="password" required>
                    <span class="mostrar_senha" onclick="togglePassword()">
                        <img id="eye" src="Assets/Img/olhoFechado.png" alt="Olho fechado" class="eye-icon">
                        <img id="eye-open" src="Assets/Img/olhoAberto.png" alt="Olho aberto" class="eye-icon" style="display: none;">
                    </span>
                </div>
                <a style="font-size:12px;"href="esqueci_senha.php" class="esqueci_senha">Esqueci minha senha</a>
                <button type="submit" class="btn-login">Entrar</button>
                <p>ou</p>
                <a href="login2.php" class="Registrar">Registre-se</a>
            </form>
        </div>
    </main>
</body>
</html>