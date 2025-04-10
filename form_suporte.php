<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
        $user = 'u531683190_ryan';
        $password = 'RyanGuida123';

    try {
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se todos os campos foram preenchidos
        if (!isset($_POST['titulo'], $_POST['descricao'], $_POST['gravidade'])) {
            die("Todos os campos são obrigatórios.");
        }

        $titulo = trim($_POST['titulo']);
        $descricao = trim($_POST['descricao']);
        $gravidade = (int) $_POST['gravidade'];

        // Evita inserção de campos vazios ou gravidade fora do limite
        if (empty($titulo) || empty($descricao) || $gravidade < 1 || $gravidade > 10) {
            die("Dados inválidos! Verifique os campos.");
        }

        // Insere os dados no banco
        $sql = "INSERT INTO tb_suporte (titulo, descricao, gravidade) VALUES (:titulo, :descricao, :gravidade)";
        $dados = $banco->prepare($sql);
        $dados->bindParam(':titulo', $titulo);
        $dados->bindParam(':descricao', $descricao);
        $dados->bindParam(':gravidade', $gravidade);
        $dados->execute();

        echo "<script>alert('Reclamação enviada com sucesso!'); window.location.href='suporte.php';</script>"; //ARRUMAR IMEDIATAMENTE ANTES DE ENVIAR O PI PELAMOR DE DEUS!!!!!!!!!!!!!!!!!!!!!
    } catch (PDOException $e) {
        echo "Erro ao enviar reclamação: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido!";
}
