<?php
require_once __DIR__ . '/../config/config.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function cadastrar($nome, $email, $senha, $data_nascimento) {
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        
        $stmt = $this->db->prepare(
            "INSERT INTO tb_usuarios (nome, email, senha, data_nascimento) 
             VALUES (:nome, :email, :senha, :data_nascimento)"
        );
        
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash,
            ':data_nascimento' => $data_nascimento
        ]);
    }

    public function autenticar($email, $senha) {
        $stmt = $this->db->prepare("SELECT * FROM tb_usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_usuarios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>