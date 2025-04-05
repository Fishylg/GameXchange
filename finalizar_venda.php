
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finalizar venda</title>
    <link rel="stylesheet" href="Assets/Css/finalizar-venda.css">
</head>
<section id="principal">
    <img src="Assets/Img/Logo.png" alt="Logo" class="logo">
    <div class="barra"></div>

    <div class="itens">
        <h1>Finalizar Compra</h1>
        <img src="Assets/Img/SR_logo.png" alt="logo_game_php" class="logo_game">

        <h4 class="nome-jogo">Nome do jogo PHP</h4>

        <div class="precos">
            <ul>
                <li><h4>Preço base:</h4></li>
                <li><h4>Descontos:</h4></li>
                <li><h4>Preço final:</h4></li>
            </ul>
            <ul>
                <li><h4>R$ PHP</h4></li>
                <li><h4>R$ PHP</h4></li>
                <li><h4>R$ PHP</h4></li>
            </ul>
        </div>

        <input class="promocional" type="text" placeholder="Insira o código promocional...">

        <div class="barra2"></div>

        <div class="email">
            <input type="checkbox" name="email_promocional" id="email">
            <label for="email">Ao marcar esta opção eu concordo com os Termos de licença, receber a via pelo Email e as políticas de privacidade do site e do produto.</label>
        </div>

        <div class="comprar_btn">
            <button class="confirmar" onclick="confirmarCompra()">Confirmar compra!</button>
            <button class="cancelar" onclick="window.location.href='index.php'">Cancelar compra</button>
        </div>
    </div>
</section>

<script>
function confirmarCompra() {
    alert('Compra confirmada!');
    // depois você pode fazer o redirect pra página de sucesso
}
</script>
