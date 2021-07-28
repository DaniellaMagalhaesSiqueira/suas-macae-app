<main class="content">
<?php 
    renderTitle(
        'Gerenciamento de Unidades Ativas SUAS',
        'Mantenha os dados atualizados',
        'icofont-gears'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");

?>
 <a href="form_unidade.php" 
        class="btn btn-lg btn-primary mb-3 ml-3">Nova Unidade</a>
 <a href="reativar_unidade.php" 
        class="btn btn-lg btn-danger mb-3 ml-3">Reativar Unidades Inativas</a>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Tipo</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Editar</th>
            <th>Desativar</th>
        </thead>
        <tbody>
            <?php foreach($unidades as $u):?>
            <tr>
                <td><?= $u->tipo_unidade ?></td>
                <td><?= $u->nome_unidade ?></td>
                <td><?= $u->email_unidade ?></td>
                <td><?= $u->tel1_unidade?></td>
                <td>
                    <a href="form_unidade.php?update=<?= $u->id_unidade ?>" 
                        class="btn text-dark mr-2" title="editar <?= $u->nome_unidade ?>">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="desativar_unidade.php?update=<?= $u->id_unidade ?>"
                        class="btn" title="desativar <?= $u->nome_unidade ?>">
                        <i class="icofont-trash text-dark"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>

</main>