<main class="content">
<?php 
    renderTitle(
        'Beneficios',
        'Verifique os critérios de elegibilidade',
        'icofont-ui-rating text-warning'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Código</th>
            <th>Nome do Benefício</th>
            <th>Âmbito</th>
            <th>Sigla</th>
            <th>Estado</th>
            <th>Critérios</th>
        </thead>
        <tbody>
            <?php foreach($beneficios as $b):?>
            <tr>
                <td><?= $b->id_beneficio ?></td>
                <td><?= $b->nome_beneficio ?></td>
                <td><?= $b->ambito_beneficio ?></td>
                <td><?= $b->sigla_beneficio ?></td>
                <td><?= $b->ativo_beneficio == 1 ? 'Ativo' : 'Inativo' ?></td>
                <td><a class="btn" data-toggle="modal" data-target="#modal<?= $b->id_beneficio ?>"><i class="icofont-touch"></i></a></td>
                <td><div id="modal<?= $b->id_beneficio ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-header">Critérios de Elegibilidade (<?= $b->sigla_beneficio ?>)</div>
                                <div class="card-body">
                                    <p class="card-text"><?= $b->criterios_elegibilidade ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></td>
        </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>