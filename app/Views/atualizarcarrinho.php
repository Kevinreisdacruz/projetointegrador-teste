<div class='card-container' data-aos='fade-right'>

    <div class='card-produtos'>
        <img src="<?= base_url('assets/uploads/' . $produtos['Imagem']) ?>" alt='' style="width: auto; height: auto;">
        <div class='card-content-produtos'>
            <h3 style=" font-family: 'Anton SC', sans-serif;   font-weight: 400; font-style: normal;"><?= $produtos['Nome'] ?></h3>
            <p style="font-family: Arial, Helvetica, sans-serif;  font-size: 15px; line-height: 1.3;">
                <?= $produtos['Descricao'] ?>
                <br><br><span style="font-weight: bold;">R$:<?= $produtos['Preco'] ?></span><br>
            </p>
            <button onclick="btnMenos()" class="btn btn-primary" style="margin: 10px">-</button>
            <?php if (isset($produtos['qtd'])) : ?>
                <span id="qtd" name="qtd"><?= $produtos['qtd'] ?></span>
            <?php else : ?>
                <span id="qtd" name="qtd">1</span>
            <?php endif; ?>
            <button onclick="btnMais()" class="btn btn-primary" style="margin: 10px">+</button>
            <button onclick="adicionaCarrinho()" class="btn btn-primary">Comprar</button>
        </div>
    </div>

</div>


<script>
    let qtd = 1;

    function btnMais() {
        qtd++;
        document.getElementById("qtd").innerHTML = qtd;
    }

    function btnMenos() {
        if (qtd == 0) {
            qtd = 0;
        } else {
            qtd--;
        }

        document.getElementById("qtd").innerHTML = qtd;
    }

    function adicionaCarrinho() {
        window.location.href = `<?= site_url("carrinho/adicionaProduto/" . $produtos['IdProdutos'] . "/") ?>${qtd}`;
    }

    function removerdoCarrinho() {
        window.location.href = `<?= site_url("carrinho/removeProduto/" . $produtos['IdProdutos'] . "/") ?>`;
    }
</script>