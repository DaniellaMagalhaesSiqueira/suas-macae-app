<main class="content">
<?php
    renderTitle(
        'Unidades Inativas do SUAS',
        'Selecione uma unidade para reativá-la',
        'icofont-ui-folder'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
<table class="table table-borded table-striped table-hover">
        <thead>
            <th>Tipo</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Reativar</th>
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
                        class="btn text-dark mr-2" title="reativar <?= $u->nome_unidade ?>">
                        <i class="icofont-folder-open"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>