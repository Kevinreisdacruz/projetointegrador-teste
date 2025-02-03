<div class="container-table" style="padding: 1rem;">
    <div class="segura-table mx-auto p-2" style="width: 100rem; ">
        <div class="titulo-table">
            <div class="escrita-table" style="padding: 1rem;">
                <h3 style="color: white;">TABELA DE CLIENTES</h3>
            </div>
        </div>

        <?= form_open('usuario', 'method="get" class="row g-3"') ?>
        <div class="buscar-cli" style="padding: 1rem;">
            <input name="pesquisar" type="text" placeholder="BUSCAR">
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
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableclientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente['IdUsuario'] ?></td>
                        <td><?= $cliente['Nome'] ?></td>
                        <td><?= $cliente['Email'] ?></td>
                        <td><?= $cliente['Telefone'] ?></td>
                        <td>
                            <a href="<?= site_url('usuario/editarUsuario/' . $cliente['IdUsuario']); ?>">ALTERAR</a>
                            
                            <a style="background-color: red;" href="<?= site_url('usuario/excluirUsuario/' . $cliente['IdUsuario']); ?>">EXCLUIR</a><br><br>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>