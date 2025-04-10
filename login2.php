<?php
session_start();

if (isset($_SESSION['usuario_id'])) { // Se o usuário tentar entrar mesmo logado, ele é redirecionado de volta pro index.php
    header("Location: index.php");
    exit;
}



$erro = ""; // Variável para armazenar mensagens de erro, vai por mim, ele ajuda!!!

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];

    // Validar se todos os campos foram preenchidos corretamente
    if (!is_numeric($dia) || !is_numeric($mes) || !is_numeric($ano) || $ano < 1900) {
        $erro = "Data inválida!";
    } else {
        // Calcular idade
        $dataNascimento = "$ano-$mes-$dia";
        $hoje = new DateTime();
        $dataNasc = new DateTime($dataNascimento);
        $idade = $hoje->diff($dataNasc)->y;

        if ($idade < 18) {
            $erro = "Você precisa ter 18 anos ou mais para se cadastrar.";
        } else {
            // Armazena a data na sessão e redireciona para a próxima página
            $_SESSION['data_nascimento'] = $dataNascimento;
            header("Location: login3.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameXchange - Criar Conta</title>
    <link rel="stylesheet" href="./Assets/Css/login2.css">
    <link rel=’shortcut icon’ href=’favicon.ico’ type=’image/x-icon’ />
</head>
<body>
    <div class="login2-container">
        <div class="form-box">
            <img src="./Assets/Img/Logo.png" alt="GameXchange" class="logo">
            <h2>Criar conta</h2>
            <p>Insira sua data de nascimento</p>

            <?php if ($erro): ?>
                <div class="erro"><?= $erro ?></div> <!-- Exibe erro se houver -->
            <?php endif; ?>

            <form action="login2.php" method="POST">
                <div class="dob-inputs">
                    <select name="dia" required>
                        <option value="">Dia</option>
                        <?php for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='$i'>$i</option>";
                        } ?>
                    </select>
                    <select name="mes" required>
                        <option value="">Mês</option>
                        <?php 
                        $meses = [
                            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                        ];
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='$i'>" . $meses[$i - 1] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="number" name="ano" placeholder="Ano" min="1900" max="<?= date('Y') ?>" required>
                </div>
                <button type="submit" class="continuar">Continuar</button>
            </form>

            <p class="login-text">Já tem uma conta? <a href="login1.php" class="Registrar">Entrar</a></p>
        </div>
    </div>
</body>
</html>
