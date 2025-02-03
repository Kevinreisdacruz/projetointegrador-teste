<?php echo form_open_multipart('addproduto/validacao'); ?>
<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ADICIONAR PRODUTO</h2>
        </div>

        <div class="inf-add-produto">
            <select name="opcao" id="">
                <?php foreach($catalogos as $catalogo):?>
                    <option value="<?=$catalogo['IdCatalogos']?>"><?= $catalogo['Nome'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="text" name="nome_addproduto" placeholder="NOME DO PRODUTO"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['nome_addproduto'] ?? '' ?></span>

            <input type="text" name="descricao_addproduto" placeholder="DESCRIÇÃO"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['descricao_addproduto'] ?? '' ?></span>

            <input type="text" name="preco_addproduto" id="fone" placeholder="PREÇO"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['preco_addproduto'] ?? '' ?></span>


            <input name="imagem_addproduto" type="file"><br>
            <span style="color: red;"><?php echo session()->getFlashdata('error')['imagem_addproduto'] ?? '' ?></span>

        </div>

        <div class="botoes-add-produto">
            <a href="<?= base_url('/'); ?>">
                <button class="btn-add-produto">ADICIONAR PRODUTO</button><br>
            </a>
            <a href="<?= base_url('administracao'); ?>">
                <button class="btn-add-produto">CANCELAR</button>
            </a>
        </div>
    </div>
</div>
<?php form_close(); ?>