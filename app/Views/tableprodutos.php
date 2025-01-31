<div class="container-table" style="padding: 1rem;">
    <div class="segura-table mx-auto p-2" style="width: 100rem; ">
        <div class="titulo-table">
            <div class="escrita-table" style="padding: 1rem;">
                <h3 style="color: white;">TABELA DE CLIENTES</h3>
            </div>
        </div>

        <div class="buscar-cli" style="padding: 1rem;">
            <input type="text" placeholder="BUSCAR">
            <select>
                <option value="">ID</option>
                <option value="">NOME</option>
            </select>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>DESCRICAO</th>
                    <th>PREÇO</th>
                    <th>EXCLUIR</th>
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
                        <a href="<?= site_url('produtos/editarproduto/' . $produto['IdProdutos']); ?>">ALTERAR</a>
                    </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>