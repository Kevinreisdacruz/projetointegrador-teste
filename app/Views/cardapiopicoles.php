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
        <a href='' class='btn-card-pginicial shadow'>COMPRAR</a>
      </div>
    </div>

  <?php endforeach ?>

  <!-- <div class='card-produtos'>
    <img src='assets/imagepicoles/picolemorango.png' alt='' style="width: auto; height: auto;">
    <div class='card-content-produtos'>
      <h3 style=" font-family: 'Anton SC', sans-serif;   font-weight: 400; font-style: normal;">morango</h3>
      <p style="font-family: Arial, Helvetica, sans-serif;  font-size: 15px; line-height: 1.3;">
      O picolé de morango é uma sobremesa gelada e refrescante, com sabor doce e frutado, ideal para dias quentes.
      <br><br><span style="font-weight: bold;">R$:15,90</span><br>
      </p>
      <a href='' class='btn-card-pginicial shadow'>COMPRAR</a>
    </div>
  </div>

  <div class='card-produtos'>
    <img src='assets/imagepicoles/picolechocolate.png' alt='' style="width: auto; height: auto;">
    <div class='card-content-produtos'>
      <h3 style=" font-family: 'Anton SC', sans-serif;   font-weight: 400; font-style: normal;">chocolate</h3>
      <p style="font-family: Arial, Helvetica, sans-serif;  font-size: 15px; line-height: 1.3;">
      O picolé de chocolate é uma sobremesa gelada e cremosa, ideal para os amantes de chocolate, perfeita para dias quentes.
      <br><br><span style="font-weight: bold;">R$:15,90</span><br>
      </p>
      <a href='' class='btn-card-pginicial shadow'>COMPRAR</a>
    </div>
  </div> -->

  </div>