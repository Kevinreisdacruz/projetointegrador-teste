<?php echo form_open_multipart('usuario/alterarCliente') ?>
<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ATUALIZAR CLIENTE</h2>
        </div>

        <div class="inf-add-produto">
            <input name="IdUsuario"  value="<?= $cliente['IdUsuario'] ?>"  type="text"  placeholder="ID DO USUARIO" readonly>
            <input name="alterar_nomeusuario"  value="<?= $cliente['Nome'] ?>"  type="text" placeholder="NOME DO USUARIO">
            <input name="alterar_emailusuario"  value="<?= $cliente['Email'] ?>" type="text" placeholder="EMAIL">
            <input name="alterar_telefoneusuario"  value="<?= $cliente['Telefone'] ?>" type="text" id="fone"  placeholder="TELEFONE">
        </div>

        <div class="botoes-add-produto">
            <button type="submit" class="btn-add-produto">ATUALIZAR</button><br>

            <a href="<?= base_url('administracao'); ?>">
                <button class="btn-add-produto">CANCELAR</button>
            </a>
        </div>
    </div>
</div>
<?php echo form_close() ?>