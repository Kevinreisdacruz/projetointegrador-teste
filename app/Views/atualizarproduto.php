<?php echo form_open_multipart('produtos/alterarproduto') ?>
<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ATUALIZAR PRODUTO</h2>
        </div>

        <div class="inf-add-produto">
            <input name="IdProdutos"  value="<?= $produto['IdProdutos'] ?>"  type="text" required='required' placeholder="NOME DO PRODUTO" readonly>
            <input name="alterar_nomeproduto"  value="<?= $produto['Nome'] ?>"  type="text" required='required' placeholder="NOME DO PRODUTO">
            <input name="alterar_descricaoproduto"  value="<?= $produto['Descricao'] ?>" type="text" required='required' placeholder="DESCRIÇÃO">
            <input name="alterar_precoproduto"  value="<?= $produto['Preco'] ?>" type="text" id="fone" required='required' placeholder="PREÇO">
            <input name="alterar_imagem"  value="<?=$produto['Imagem'] ?>" type="file">
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