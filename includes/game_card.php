<div class="col-lg-3 col-md-6 col-sm-12">
    <a href="../sistema/jogos/view.php?id=<?= $jogo['id'] ?>" class="link_jogo">
        <figure>
            <img src="../../assets/img/jogos/<?= $jogo['imagem'] ?>"
                alt="<?= $jogo['titulo'] ?>" class="foto-jogo">
            <figcaption>
                <h4><?= $jogo['titulo'] ?></h4>
                <span class="preco">R$ <?= number_format($jogo['preco'], 2, ',', '.') ?></span>
                <p class="descricao"><?= substr($jogo['descricao'], 0, 100) ?>...</p>
            </figcaption>
            <span class="generos">
                <?php foreach ($generosJogo as $genero) { ?>
                    <span style="background-color: <?= $genero['cor'] ?>;"><?= $genero['nome'] ?></span>
                <?php } ?>
            </span>
        </figure>
    </a>
</div>