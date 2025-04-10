<?php
require_once __DIR__ . '/../config/config.php';

class Genero {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM tb_generos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorJogo($jogo_id) {
        $stmt = $this->db->prepare(
            "SELECT g.* FROM tb_generos g
             INNER JOIN tb_jogo_genero jg ON jg.genero_id = g.id
             WHERE jg.jogo_id = :jogo_id"
        );
        $stmt->execute([':jogo_id' => $jogo_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>