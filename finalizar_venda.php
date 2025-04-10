<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login1.php');
    exit;
}

$dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
$banco = new PDO($dsn, $user, $password);

if (!isset($_GET['id'])) {
    echo "ID do jogo não fornecido.";
    exit;
}

$id = (int) $_GET['id'];

$select = 'SELECT * FROM tb_jogos WHERE id_jogos = :id';
$dados = $banco->prepare($select);
$dados->bindParam(':id', $id, PDO::PARAM_INT);
$dados->execute();
$jogo = $dados->fetch(PDO::FETCH_ASSOC);

if (!$jogo) {
    echo "Jogo não encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra - <?= htmlspecialchars($jogo['nome']) ?></title>
    <link rel="stylesheet" href="Assets/Css/finalizar-venda.css">
</head>
<body>
    <section id="principal">
        <img src="Assets/Img/Logo.png" alt="Logo" class="logo">
        <div class="barra"></div>
        <div class="itens">
            <h1>Finalizar Compra</h1>
            <img src="./Assets/Img/vendas/<?= htmlspecialchars($jogo['foto0']) ?>" alt="logo_game" class="logo_game">
            <h4 class="nome-jogo"><?= htmlspecialchars($jogo['nome']) ?></h4>

            <?php
            $preco = (float) $jogo['preco'];
            $desconto = 0;
            $preco_final = $preco - $desconto;
            ?>

            <div class="precos">
                <ul>
                    <li><h4>Preço base:</h4></li>
                    <li><h4>Descontos:</h4></li>
                    <li><h4>Preço final:</h4></li>
                </ul>
                <ul>
                    <li><h4 id="preco-base">R$ <?= number_format($preco, 2, ',', '.') ?></h4></li>
                    <li><h4 id="preco-desconto">R$ <?= number_format($desconto, 2, ',', '.') ?></h4></li>
                    <li><h4 id="preco-final">R$ <?= number_format($preco_final, 2, ',', '.') ?></h4></li>
                </ul>
            </div>
            <input class="promocional" type="text" id="campo-cupom" placeholder="Insira o código promocional...">
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
    const precoOriginal = <?= $preco ?>;
    
    document.getElementById('campo-cupom').addEventListener('input', function () {
        const cupom = this.value.trim();
    
        if (cupom.length === 0) {
            atualizarPrecos(0);
            return;
        }
    
        fetch(`Assets/php/cupom.php?cupom=${encodeURIComponent(cupom)}`)
            .then(res => res.json())
            .then(data => {
                const desconto = data.desconto || 0;
                atualizarPrecos(desconto);
            });
    });
    
    function atualizarPrecos(descontoPercentual) {
        const desconto = precoOriginal * (descontoPercentual / 100);
        const precoFinal = precoOriginal - desconto;
    
        document.getElementById('preco-desconto').innerText = 'R$ ' + desconto.toFixed(2).replace('.', ',');
        document.getElementById('preco-final').innerText = 'R$ ' + precoFinal.toFixed(2).replace('.', ',');
    }
    </script>
    <script>
    function confirmarCompra() {
        const idJogo = <?= $id ?>;
    
        fetch('./Assets/php/finalizar_compra.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id_jogo=${idJogo}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.sucesso) {
                alert('Compra confirmada! Chave: ' + data.chave);
                // Redirecionar ou mostrar em outra tela
                window.location.href = 'perfil.php'; // ou outra tela
            } else {
                alert('Erro ao finalizar compra.');
            }
        })
        .catch(err => {
            console.error('Erro na compra:', err);
            alert('Erro ao processar a compra.');
        });
    }
    </script>
</body>
</html>



