<?php
require_once __DIR__ . '/Database.php';

class Jogo {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function listar($limite = null) {
        $sql = "SELECT * FROM tb_jogos WHERE status = 'ativo'";
        
        if ($limite) {
            $sql .= " LIMIT :limite";
        }
        
        $stmt = $this->db->prepare($sql);
        
        if ($limite) {
            $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_jogos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($dados) {
        $stmt = $this->db->prepare(
            "INSERT INTO tb_jogos 
            (titulo, descricao, preco, plataforma, estado, imagem, usuario_id) 
            VALUES 
            (:titulo, :descricao, :preco, :plataforma, :estado, :imagem, :usuario_id)"
        );
        
        return $stmt->execute($dados);
    }
}
?>