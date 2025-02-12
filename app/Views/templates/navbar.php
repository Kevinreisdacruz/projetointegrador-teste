<!doctype html>
<html lang='pt-br'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title><?= esc($title) ?></title>
  <link href='https://unpkg.com/aos@2.3.1/dist/aos.css' rel='stylesheet'>
  <script src='https://unpkg.com/aos@2.3.1/dist/aos.js'></script>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  <link rel="stylesheet" href="<?= site_url('assets/css/global.css') ?>">

</head>

<body>
  <!-- html de alteracao de cadastro comeca aqui -->

  <div id="container-alterar">
    <div class="fundo-alterar shadow-lg">

      <div class="titulo-alterar">
        <h3 style="font-weight: bold; font-size: 2rem; margin:0;">ALTERAÇÃO</h3>
      </div>

      <div class="inf-alteracoes">
        <input type="text" placeholder="COLOQUE AQUI SEU NOVO EMAIL">
        <input type="text" placeholder="COLOQUE AQUI SUA NOVA SENHA">
        <input type="text" placeholder="COLOQUE AQUI SEU NOVO TELEFONE">
      </div>

      <div class="botoes-alteracoes">
        <a href="<?= base_url('/'); ?>">
          <button class="btn-alteracoes" style="font-weight: bold;">CONFIRMAR ALTERACÕES</button><br>
        </a>
        <a href="<?= base_url('/'); ?>">
          <button class="btn-esquecer-alteracoes" style="font-weight: bold;">CANCELAR ALTERACÕES</button>
        </a>
      </div>

    </div>

  </div>

  <!-- html de alteracao de cadastro termina aqui -->


  <nav class="navbar navbar-expand-lg bg-body-tertiary py-4 navbarcss">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="<?= base_url('/'); ?>">
        <img id="logo" src="assets/imagelogos/logo3.png" alt="" width="95">
      </a>
      <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
        <ul class="navbar-nav mb-2 mb-lg-0 me-auto box-link">
          <li class="nav-item">
            <a href="<?= base_url('login'); ?>" id="login" class="nav-link active link-navbar " aria-current="page">Entrar</a>
            <?php if (session()->has('usuario')) : ?>

            <?php endif ?>
          </li>
          <li class="nav-item">
            <a class="nav-link active link-navbar" href="<?= base_url('carrinho'); ?>">Carrinho</a>
          </li>
        </ul>


        <?php if (auth()->loggedIn()) : ?>
          ola, <?php echo auth()->user()->username; ?>
          <a class="logout" href="<?= site_url('logout') ?>">sair</a>
        <?php else : ?>
        <?php endif; ?>
        
        <a href="<?= base_url('administracao'); ?>">
          <img src="assets/imagelogos/user-icon.png" alt="" style="width: 33px; margin-right: 1rem;">
   
        </a>

       

      <form class="d-flex my-3" role="search">
        <input class="form-control me-2" type="search" placeholder="o que você procura ?" aria-label="Search">
        <button class="btn btn-outline-success pesquisar border-0 shadow-sm" type="submit">Procurar</button>
      </form>
    </div>
    </div>
  </nav>