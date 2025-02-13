<div class='card-container' data-aos='fade-right'>
  <?php foreach ($catalogos as $catalogo) : ?>

    <div id="scroll"></div>
    <div class='card-pginicial'>
      <img src="<?= base_url('assets/uploads/' . $catalogo['Imagem']) ?>" alt='' style="width: 100%; height: auto;">
      <div class='card-content'>
        <h3 style=" font-family: 'Anton SC', sans-serif;   font-weight: 400; font-style: normal;"><?= $catalogo['Nome'] ?></h3>
        <p style="font-family: Arial, Helvetica, sans-serif;  font-size: 15px; line-height: 1.3;"><?= $catalogo['Descricao'] ?>
        </p>
        <a href="<?= base_url('cardapiomassa'); ?>" class='btn-card-pginicial shadow'>VEJA MAIS</a>
      </div>
    </div>
  <?php endforeach ?>
</div>