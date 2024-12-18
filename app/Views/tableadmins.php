<script>
    function confirma(){
        if (! confirm('Deseja excluir esse admin?')){
            return false;
        }
        return true;
    }
</script>


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
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>
            <?php foreach ($tableadmins as $admins) : ?>
                <td><?php echo $admins['IdUsuario'] ?></td>
                <td><?php echo $admins['nome'] ?></td>
                <td><?php echo $admins['email'] ?></td>
                <td><?php echo $admins['telefone'] ?></td>
                <td><?php echo anchor('admins/editar/' .$admins['IdUsuario'], 'EDITAR') ?></td>
                <td><?php echo anchor('admins/excluir/' .$admins['IdUsuario'], 'EXCLUIR', ['onclick' => 'return confirma()']) ?></td>

            <?php endforeach;  ?>

        </table>


    </div>
</div>