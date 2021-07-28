<main class="content">
<?php 
    renderTitle(
        'Gerenciamento de Beneficios',
        'Ative ou desative benefícios na opção editar',
        'icofont-ui-rating text-warning'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
<a href="form_beneficio.php" 
        class="btn btn-lg btn-primary mb-3 ml-3">Novo Benefício</a>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Código</th>
            <th>Nome do Benefício</th>
            <th>Âmbito</th>
            <th>Sigla</th>
            <th>Estado</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php foreach($beneficios as $b):?>
            <tr>
                <td><?= $b->id_beneficio ?></td>
                <td><?= $b->nome_beneficio ?></td>
                <td><?= $b->ambito_beneficio ?></td>
                <td><?= $b->sigla_beneficio ?></td>
                <td><?= $b->ativo_beneficio == 1 ? 'Ativo' : 'Inativo' ?></td>
                <td>
                    <a href="form_beneficio.php?update=<?= $b->id_beneficio ?>" 
                        class="btn text-dark mr-2" title="editar <?= $b->nome_beneficio ?>">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>