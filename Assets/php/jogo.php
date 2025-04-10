<?php
class Jogo {
    private $banco;
    public $id, $nome, $nota, $preco, $data_lancamento, $descricao, $classificacao_indicativa, $fotos = [], $banner;

    public function __construct(PDO $banco) {
        $this->banco = $banco;
    }

    public function carregar($id) {
        $sql = "SELECT * FROM tb_jogos WHERE id_jogos = :id";
        $dados1 = $this->banco->prepare($sql);
        $dados1->bindValue(':id', $id, PDO::PARAM_INT);
        $dados1->execute();
        $dados = $dados1->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $this->id = $id;
            $this->nome = $dados['nome'];
            $this->nota = $dados['nota'];
            $this->preco = $dados['preco'];
            $this->data_lancamento = $dados['data_lancamento'];
            $this->descricao = $dados['descricao'];
            $this->classificacao_indicativa = $dados['classificacao_indicativa'];
            $this->banner = $dados['banner'];

            for ($i = 0; $i <= 4; $i++) {
                $this->fotos[$i] = $dados["foto$i"];
            }
        }
    }

    public function salvar() {
        $sql = "INSERT INTO tb_jogos (nome, nota, preco, data_lancamento, descricao, classificacao_indicativa, foto0, foto1, foto2, foto3, foto4, banner)
                VALUES (:nome, :nota, :preco, :data_lancamento, :descricao, :classificacao, :foto0, :foto1, :foto2, :foto3, :foto4, :banner)";
        $dados1 = $this->banco->prepare($sql);
        $this->bindParams($dados1);
        return $dados1->execute();
    }

    public function atualizar() {
        $sql = "UPDATE tb_jogos SET nome = :nome, nota = :nota, preco = :preco, data_lancamento = :data_lancamento,
                descricao = :descricao, classificacao_indicativa = :classificacao,
                foto0 = :foto0, foto1 = :foto1, foto2 = :foto2, foto3 = :foto3, foto4 = :foto4, banner = :banner
                WHERE id_jogos = :id";
        $dados1 = $this->banco->prepare($sql);
        $dados1->bindValue(':id', $this->id, PDO::PARAM_INT);
        $this->bindParams($dados1);
        return $dados1->execute();
    }

    private function bindParams($dados1) {
        $dados1->bindValue(':nome', $this->nome);
        $dados1->bindValue(':nota', $this->nota);
        $dados1->bindValue(':preco', $this->preco);
        $dados1->bindValue(':data_lancamento', $this->data_lancamento);
        $dados1->bindValue(':descricao', $this->descricao);
        $dados1->bindValue(':classificacao', $this->classificacao_indicativa);
        $dados1->bindValue(':banner', $this->banner);

        for ($i = 0; $i <= 4; $i++) {
            $dados1->bindValue(":foto$i", $this->fotos[$i]);
        }
    }
}