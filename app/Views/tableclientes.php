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
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">grupo</th>
                    <th scope="col">Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableclientes as $clientes) : ?>
                    <tr>
                        <td scope="row"><?= $clientes->id ?></td>
                        <td><?= $clientes->username ?></td>
                        <td><?= implode(',', $clientes->getGroups()) ?></td>
                        <td>
                            <?php if (str_contains(implode(',', $clientes->getGroups()), 'administrador')) : ?>
                                <a href="<?= site_url('usuarios/removeAdmin/' . $clientes->id) ?>" class="btn btn-warning me-3">remove admin</a>
                            <?php else : ?>
                                <a href="<?= site_url('usuarios/defineAdmin/' . $clientes->id) ?>" class="btn btn-info me-3">define admin</a>
                            <?php endif ?>
                            <a href="<?= site_url('usuarios/excluirusuarios/' . $clientes->id) ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
              
            </tbody>
        </table>
    </div>
</div>