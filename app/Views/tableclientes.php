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
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableclientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente['IdUsuario'] ?></td>
                        <td><?= $cliente['Nome'] ?></td>
                        <td><?= $cliente['Email'] ?></td>
                        <td><?= $cliente['Telefone'] ?></td>
                        <td><?php echo anchor('usuario/delete/' . $cliente['IdUsuario'], 'EXCLUIR') ?></td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>