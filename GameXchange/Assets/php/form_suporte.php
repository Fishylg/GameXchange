<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dsn = 'mysql:dbname=bd_gamexchange;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $gravidade = $_POST['gravidade'];

        $sql = "INSERT INTO tb_suporte (titulo, assunto, gravidade) VALUES (:titulo, :descricao, :gravidade)";
        $dados = $banco->prepare($sql);
        $dados->bindParam(':titulo', $titulo);
        $dados->bindParam(':descricao', $descricao);
        $dados->bindParam(':gravidade', $gravidade);
        $dados->execute();

        echo "Reclamação enviada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao enviar reclamação: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido!";
}
