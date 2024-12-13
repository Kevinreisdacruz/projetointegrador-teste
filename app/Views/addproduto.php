
<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ADICIONAR PRODUTO</h2>
        </div>

        <div class="inf-add-produto">
            <input type="text" required='required' placeholder="NOME DO PRODUTO">
            <input type="text" required='required' placeholder="DESCRIÇÃO">
            <input type="text" id="fone" required='required' placeholder="PREÇO">
            <input type="file">
        </div>

        <div class="botoes-add-produto">
            <a href="<?=base_url('/');?>">
                <button class="btn-add-produto">ADICIONAR PRODUTO</button><br>
            </a>
            <a href="<?=base_url('administracao');?>">
                <button class="btn-add-produto">CANCELAR</button>
            </a>
        </div>
    </div>
</div>
