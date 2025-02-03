<div class="container-table" style="padding: 5rem;">
    <div  class="segura-table  table-responsive mx-auto p-2" style="width: 100rem; ">
        <div class="titulo-table">
            <div class="escrita-table" style="padding: 1rem;">
                <h3 style="color: white;">TABELA DE CATÁLOGOS</h3>
            </div>
        </div>

        <?= form_open('catalogos', 'method="get" class="row g-3"') ?>
        <div class="buscar-cli" style="padding: 1rem;">
            <input name="buscar" type="text" placeholder="BUSCAR">
            <select name="opcao">
                <option value="1">ID</option>
                <option value="2">NOME</option>
            </select>
            <button type="submit">PESQUISAR</button>
        </div>
        <?= form_close(); ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($catalogos as $catalogo) : ?>
                    <tr>
                    <td><?= $catalogo['IdCatalogos'] ?></td>
                    <td><?= $catalogo['Nome'] ?></td>
                    <td><?= $catalogo['Descricao'] ?></td>
                    <td>
                        <a href="<?= site_url('catalogos/atualizarcatalogo/' . $catalogo['IdCatalogos']); ?>">ALTERAR</a><br><br>
                        <a style="background-color: red;" href="<?= site_url('catalogos/excluircatalogo/' . $catalogo['IdCatalogos']); ?>">EXCLUIR</a>
                    </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>