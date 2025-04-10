<?php
class Pesquisa {
    private $pdo;

    public function __construct() {
        $dsn = 'mysql:dbname=u531683190_bd_gamexchange;host=localhost';
$user = 'u531683190_ryan';
$password = 'RyanGuida123';
        $this->pdo = new PDO($dsn, $user, $password);
    }

    public function buscarJogos($termo) {
        $sql = "SELECT * FROM tb_jogos WHERE nome LIKE :termo";
        $dados = $this->pdo->prepare($sql);
        $dados->bindValue(':termo', "%$termo%");
        $dados->execute();
        return $dados->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
