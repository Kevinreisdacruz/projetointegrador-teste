<div class="box-carrinho">
  <div class="interior-carrinho shadow">


    <?php
    if (session()->get('carrinho')) {
      $carrinho = session()->get('carrinho');
      $total = 0;
    }
    ?>

    <?php foreach ($produtos['item'] as $produto) : ?>
      <div class="produtos-carrinho">
        <div style="padding: 2.5rem;" class="image-produto">

          <img src="<?= site_url('assets/uploads/' . $produto['Imagem']) ?>" alt="">
          <a href="<?= base_url('produtos/AtualizarCarrinho/') . $produto['IdProdutos']  ?>">ATUAIZAR</a>
          <button  id="<?= $produto['id'] ?>" name="oi" class="btn btn-danger m-2">Remover </button>
          <h6 style="font-weight: bold; padding-left: 1rem;"><?= $produto['Nome'] ?></h6>
          <p>Quantidade: <?= $produto['qtd'] ?></p>
        </div><br>
        <div class="add-dimin">
        </div>
      </div>
    <?php endforeach ?>
    <?php
    $total += $produto['total'];
    ?>



    <hr style="width: 100%;">
    <div class="resumo">
      <h4 style="font-weight: bold; ">RESUMO DO PEDIDO</h4>

      <div class="resumo-content">
        <h5 style="font-weight: bold;">VALOR TOTAL: R$ <?= $total ?></h5>
        <h5></h5>
      </div>

      <div class="botoes">
        <a href="<?= base_url('cadcep'); ?>">
          <button class="finalizar-compra shadow-sm" style="font-weight: bold; color: white;">FINALIZAR COMPRA</button><br>
        </a>
        <a href="index.php#scroll">
          <button class="adicionar-produto shadow-sm" style="font-weight: bold; color: white;">ADICIONAR MAIS PRODUTOS</button>
        </a>
      </div>

    </div>
  </div>
</div>

<script>
  function removerdoCarrinho(id) {
    window.location.href = `<?= site_url("carrinho/removeProduto/") ?>${id}`;
  }
</script>