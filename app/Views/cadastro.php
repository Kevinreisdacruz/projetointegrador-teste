<form action="<?php echo url_to('usuario.validacao') ?>" method="post">
    <div id='container-cadastro'>
        <div class='caixa-cadastro'>
            <h1 style="font-weight: bold;">Cadastro</h1>

            <input name="nome_cadastrar" type='text' placeholder='Nome' value="<?php echo old('nome_cadastrar') ?>"><br>
            <?php
                $errors = session()->getFlashdata('errors') ?? []; //O Flashdata armazena dados temporariamente, os dados ficam disponiveis a cada requisicao apos algo ser setado no input. O session esta sendo usado para armazenar dados a cada requisicao, ele esta manipulando o flashdata, ele gerencia todos os dados.

                if (isset($errors['nome_cadastrar'])) : //Esta verificando se existe um erro que foi identificado pelo meu input "nome_cadastrar", se existir ele vai mostrar o span logo a baixo.
            ?>
                <span style="color: red;"><?php echo $errors['nome_cadastrar']; ?></span>
            <?php endif; ?>



            <br>

            <input name="email_cadastrar" type='text' placeholder='E-mail' value="<?php echo old('email_cadastrar') ?>"><br>
            <?php
                $errors = session()->getFlashdata('errors') ?? [];
                if (isset($errors['email_cadastrar'])) :
            ?>
                <span style="color: red;"><?php echo $errors['email_cadastrar']; ?></span>
            <?php endif; ?>
            <br>

            <input name="senha_cadastrar" type='password' id='senha' placeholder='Senha' value="<?php echo old('senha_cadastrar') ?>"><br>
            <?php
                $errors = session()->getFlashdata('errors') ?? [];
                if (isset($errors['senha_cadastrar'])) :
            ?>
                <span style="color: red;"><?php echo $errors['senha_cadastrar']; ?></span>
            <?php endif; ?>
            <i class='bi bi-eye-fill' id='btn-senha' onclick='mostrarsenha()'></i>
            <br>

            <input id="fone" name="telefone_cadastrar" type="" placeholder='telefone' value="<?php echo old('telefone_cadastrar') ?>"><br>
            <?php
                $errors = session()->getFlashdata('errors') ?? [];
                if (isset($errors['telefone_cadastrar'])) :
            ?>
                <span style="color: red;"><?php echo $errors['telefone_cadastrar']; ?></span>
            <?php endif; ?>
            <br>

            <button type='submit' name="cadastrar">CRIAR</button>

            <br>

            <a href="#" style="color: black">
                <h6 style="font-weight: bold;">Não desejo criar agora </h6>
            </a>
        </div>
    </div>
</form>