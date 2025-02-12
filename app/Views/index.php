<div id='carouselExampleSlidesOnly' class='carousel slide' data-bs-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active' data-bs-interval='4000'>
      <img src='assets/imagecarrosel/sei-la.png' class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item' data-bs-interval='4000'>
      <img src='assets/imagecarrosel/saboresnvsmilks.png' class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item' data-bs-interval='4000'>
      <img src='assets/imagecarrosel/pisinicial.png' class='d-block w-100' alt='...'>
    </div>
  </div>
</div>



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


<div class='box'>
  <div class='fundosobrenos shadow-sm' data-aos='zoom-in'>
    <h1>SOBRE NÓS</h1>
    <div class='escrita'>
      <h3 style="margin-top: 1rem; font-weight: bold;">BEM-VINDO À NOSSA SORVETERIA ITALIANA, ONDE TRADIÇÃO E SABOR SE ENCONTRAM PARA CRIAR MOMENTOS
        SABOROSOS PARA SUA
        VIDA. <br><br> ESTAMOS LOCALIZADOS EM RIO CLARO-SP,CENTRO, VENHA VISITAR NOSSA SORVETERIA ITALIANA ONDE CADA
        SORVETE É UMA OBRA PRIMA. <br><br> FEITA COM PAIXÃO E OS MELHORES INGREDIENTES EM NOSSO ESPAÇO ACOLHEDOR E
        ENCANTADOR, VOCÊ DESCOBRIRÁ UMA VARIEDADE DE SABORES QUE CAPTURAM A ESSÊNCIA DAS SORVETERIAS
        ITALIANAS.<br><br> DESDE OS
        CLASSICOS COMO PISTACHE, CADA SORVETE NOSSO É PREPARADO DIARIAMENTE PARA GARANTIR FRESCOR E QUALIDADE
        INCOMPARÁVEIS</h3>
    </div>
  </div>
</div>
