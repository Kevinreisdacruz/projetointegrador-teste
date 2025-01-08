
<!-- exclusao de admin -->

<div id="container-confirmar-exclusao-admin">
    <div class="fundo-confrimar-exclusao-admin shadow-lg">

        <div class="titulo-exclusao-admin">
            <h3 style="font-weight: bold; font-size: 2rem; margin:0;">EXCLUIR?</h3>
        </div>

        <div class="botoes-confirmar-acao">
            <a href="<?= base_url('tableadmins'); ?>">
                <button  class="btn-confirmar-exclusao-admin" onclick="excluiradmin()" style="font-weight: bold;">CONFIRMAR EXCLUSÃO</button><br>
            </a>
            <a href="<?= base_url('tableadmins'); ?>">
                <button class="btn-esquecer-exclusao-admin" style="font-weight: bold;">CANCELAR  EXCLUSÃO</button>
            </a>
        </div>

    </div>
</div>

<!-- exclusao de admin -->

<div class="container-table" style="padding: 1rem;">
    <div class="segura-table mx-auto p-2" style="width: 100rem; ">
        <div class="titulo-table">
            <div class="escrita-table" style="padding: 1rem;">
                <h3 style="color: white;">TABELA DE ADMINS</h3>
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
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>EXCLUIR</th>
            </tr>
            <?php foreach ($tableadmins as $admins) : ?>
                <td><?= $admins['IdUsuario'] ?></td>
                <td><?= $admins['nome'] ?></td>
                <td><?= $admins['email'] ?></td>
                <td><?= $admins['telefone'] ?></td>
                <td><?php echo anchor('usuario/delete/' . $admins['IdUsuario'] , 'EXCLUIR') ?></td>

            <?php endforeach;  ?>
        </table>


    </div>
</div>