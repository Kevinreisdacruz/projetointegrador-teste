<div id="container-add-produto">
    <div class="fundo-add-produto">
        <div class="titulo-add-produto">
            <h2 style="font-weight: bold;">ATUALIZAR CATÁLOGO</h2>
        </div>

        <select name="" id="">
            <option value="">teste</option>
        </select>
        <div class="inf-add-produto">
            <input type="text" required='required' placeholder="NOME DO CATALOGO">
            <input type="text" required='required' placeholder="DESCRIÇÃO">
            <input type="file">
        </div>

        <div class="botoes-add-produto">
            <a href="<?=base_url('/');?>">
                <button class="btn-add-produto">ATUALIZAR</button><br>
            </a>
            <a href="<?=base_url('administracao');?>">
                <button class="btn-add-produto">CANCELAR</button>
            </a>
        </div>
    </div>
</div>