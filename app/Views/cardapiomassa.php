
<div class='card-container' data-aos='fade-right'>
  <?php foreach ($produtos as $produto) : ?>
      <div class='card-produtos'>
        <img src="<?= base_url('assets/uploads/' . $produto['Imagem']) ?>" alt='' style="width: auto; height: auto;">
        <div class='card-content-produtos'>
          <h3 style=" font-family: 'Anton SC', sans-serif;   font-weight: 400; font-style: normal;"><?= $produto['Nome'] ?></h3>
          <p style="font-family: Arial, Helvetica, sans-serif;  font-size: 15px; line-height: 1.3;">
            <?= $produto['Descricao'] ?>
            <br><br><span style="font-weight: bold;">R$:<?= $produto['Preco'] ?></span><br>
          </p>
          <a href="" class='btn-card-pginicial shadow'>COMPRAR</a>
        </div>
      </div>


  <?php endforeach ?>

</div>