

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GameXchange</title>
        <link rel="stylesheet" href="./Assets/Css/login1.css">
        <script src="./Assets/Js/login1.js"></script>
    </head>
    <body>
        <main>
            <div class="login1-container">
                <div class="logo"><img src="Assets/Img/Logo.png" alt="Logo"></div>
                <h2>Entrar</h2>
                
                <div class="input">
                    <input type="email" placeholder="Endereço de e-mail" required>
                </div>
                
                <div class="input password-input">
                    <input type="password" placeholder="Senha" id="password" required>
                    <span class="mostrar_senha" onclick="togglePassword()">
                        <img id="eye" src="Assets/Img/olhoFechado.png" alt="Olho fechado" class="eye-icon">
                        <img id="eye-open" src="Assets/Img/olhoAberto.png" alt="Olho aberto" class="eye-icon" style="display: none;">
                    </span>
                </div>
                
                <button class="btn-login" onclick="window.location.href='index.html'">Entrar</button>
                
                <p>ou</p>
        
                <a href="login2.html" class="Registrar">Registre-se</a>
            </div>
        </main>
    </body>
    </html>