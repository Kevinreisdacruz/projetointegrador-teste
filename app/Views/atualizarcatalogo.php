<?php echo form_open_multipart('catalogos/alterarcatalogo') ?>
<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ATUALIZAR CATÁLOGO</h2>
        </div>
        
        <div class="inf-add-produto">
            <input name="IdCatalogos" value="<?= $catalogo['IdCatalogos'] ?>" type="text" placeholder="ID CATÁLOGO" readonly>

            <input name="atualizar_nomecatalogo" value="<?= $catalogo['Nome'] ?>" type="text" placeholder="NOME DO CATALOGO">
            <span style="color: red;"><?php echo session()->setFlashdata('error')['atualizar_nomecatalogo'] ?? '' ?></span>

            <input name="atualizar_descricaocatalogo" value="<?= $catalogo['Descricao'] ?>" type="text" placeholder="DESCRIÇÃO">
            <span style="color: red;"><?php echo session()->setFlashdata('error')['atualizar_descricaocatalogo'] ?? '' ?></span>

            <input name="atualizar_imagemcatalogo" value="<?= $catalogo['Imagem'] ?>" type="file">
            <span style="color: red;"><?php echo session()->setFlashdata('error')['atualizar_imagemcatalogo'] ?? '' ?></span>
        </div>

        <div class="botoes-add-produto">
                <button type="submit" class="btn-add-produto">ATUALIZAR</button><br>
                
            <a href="<?=base_url('administracao');?>">
                <button class="btn-add-produto">CANCELAR</button>
            </a>
        </div>
    </div>
</div>
<?php echo form_close() ?>