<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gameXchange - Criar conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./Assets/Css/login3.css">
    <script src="./Assets/Js/login3.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="text-center mb-6">
                <img src="./Assets/Img/Logo.png" alt="gameXchange logo" class="logo">
            </div>
            <h2 class="subtitle">Criar conta</h2>
            <form>
                <div class="input-group">
                    <input type="email" placeholder="Endereço de e-mail" class="input-field">
                </div>
                <div class="input-group flex">
                    <input type="text" placeholder="Nome" class="input-field half">
                    <input type="text" placeholder="Sobrenome" class="input-field half">
                </div>
                <div class="input-group relative">
                    <input type="text" placeholder="Nome de exibição" class="input-field">
                    <i class="fas fa-info-circle icon"></i>
                    <div class="tooltip">O seu nome de exibição deve conter <br> mais de 3 caracteres. Não poderá <br> conter caracteres especiais.</div>
                </div>
                <div class="input password-input">
                    <input type="password" placeholder="Criar senha" id="password" required>
                    <i class="fas fa-info-circle icon"></i>
                    <div class="tooltip">As senhas devem conter mais de <br> 5 caracteres com pelo menos 1 <br> numero e caracter especial.</div>
                    <span class="mostrar_senha" onclick="togglePassword()">
                        <img id="eye" src="Assets/Img/olhoFechado.png" alt="Olho fechado" class="eye-icon">
                        <img id="eye-open" src="Assets/Img/olhoAberto.png" alt="Olho aberto" class="eye-icon" style="display: none;">
                    </span>
                </div>
                <div class="input-group">
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox">
                        <span class="checkbox-text">Confirmo que li e aceito os <a href="#" class="link">Termos de serviço</a>.</span>
                    </label>
                </div>
                <div class="input-group">
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox">
                        <span class="checkbox-text">Enviem-me notícias, pesquisas e ofertas especiais da GameXchange (opcional)</span>
                    </label>
                </div>
                <button type="submit" class="submit-button" onclick="window.location.href='logado.php'">Continuar</button>
            </form>
            <div class="text-center mt-6">
                <p class="footer-text">Já tem uma conta? <a href="./login1.php" class="link">Entrar</a></p>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>