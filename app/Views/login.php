<form action="<?php echo url_to('usuario.entrar')?>" method="post">
    <div id='container-login'>
        <div class='caixa-login' id='caixalogin'>
            <h1 style="font-weight: bold;">Login</h1>
            <input name="email" type='text' placeholder='E-mail'>
            <br><br>
            <span style="color: red;"><?php echo session()->getFlashdata('errors')['email'] ?? '' ?></span>

            <input name="senha" type='password' id='senha' placeholder='Senha'>
            <i class='bi bi-eye-fill' id='btn-senha' onclick='mostrarsenha()'></i>
            <br><br>
            
            <span style="color: red;"><?php echo session()->getFlashdata('errors')['senha'] ?? '' ?></span>

            <button  type="submit">ENTRAR</button>
            <br><br>

            <?php if(session()->has('erro_geral')) : ?>
                <span style="color: red;"  ><?php echo session()->getFlashdata('erro_geral'); ?></span>
            <?php endif ?>

            <a href="<?= base_url('cadastro'); ?>">
                <h6 class="criar" style="color:black">Não tem uma conta?</h6>
            </a>

            <a href="<?= base_url('/'); ?>" style="color: black;">
                <h6>Não desejo me conectar agora</h6>
            </a>
        </div>
    </div>
</form>