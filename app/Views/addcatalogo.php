<?php echo form_open_multipart('addcatalogo/validacao');?>
    <div id="container-add-produto">
        <div class="fundo-add-produto">

            <div class="titulo-add-produto">
                <h2 style="font-weight: bold;">ADICIONAR CATÁLOGO</h2>
            </div>

            <div class="inf-add-produto">
                <input type="text" name="nome_catalogo"  placeholder="NOME DO CATÁLOGO"><br>
                <span style="color: red;"><?php echo session()->getFlashdata('error')['nome_catalogo'] ?? '' ?></span>

                <input type="text" name="descricao_catalogo"  placeholder="DESCRIÇÃO"><br>
                <span style="color: red;"><?php echo session()->getFlashdata('error')['descricao_catalogo'] ?? '' ?></span>

                <input type="file" name="imagem_catalogo"><br>
                <span style="color: red;"><?php echo session()->getFlashdata('error')['imagem_catalogo'] ?? '' ?></span>

            </div>
            
            
            <div class="botoes-add-produto">
                <button type="submit" name="cadastrar_catalogo" class="btn-add-produto">ADICIONAR</button><br><br>
                <a class="a-link" href="<?= base_url('administracao'); ?>">
                    CANCELAR
                </a>
            </div>
            
        </div>
        
    </div>
    <?php echo form_close(); ?> 