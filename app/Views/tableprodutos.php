<div class="container-table" style="padding: 5rem;">
    <div  class="segura-table  table-responsive mx-auto p-2" style="width: 100rem; ">
        <div class="titulo-table">
            <div class="escrita-table" style="padding: 1rem;">
                <h3 style="color: white;">TABELA DE PRODUTOS</h3>
            </div>
        </div>

        <?= form_open('pesquisa', 'method="get" class="row g-3"') ?>
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
                    <th>PREÇO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableprodutos as $produto) : ?>
                    <tr>
                    <td><?= $produto['IdProdutos'] ?></td>
                    <td><?= $produto['Nome'] ?></td>
                    <td><?= $produto['Descricao'] ?></td>
                    <td><?= $produto['Preco'] ?></td>
                    <td>
                        <a href="<?= site_url('produtos/editarproduto/' . $produto['IdProdutos']); ?>">ALTERAR</a><br><br>
                        <a style="background-color: red;" href="<?= site_url('produtos/excluirProduto/' . $produto['IdProdutos']); ?>">EXCLUIR</a>
                    </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>