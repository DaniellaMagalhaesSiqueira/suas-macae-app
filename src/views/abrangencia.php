<main class="content">
<?php 
    renderTitle(
        'Gerenciamento de Abrangência',
        'Crie bairros e gere associações com Unidades CRAS.',
        'icofont-map'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");

?> 
<a href="form_bairro.php" 
        class="btn btn-lg btn-primary mb-3 ml-3">Novo Bairro</a>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Código</th>
            <th>Bairro</th>
            <th>Unidade</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php foreach($bairros as $b):?>
            <tr>
                <td><?= $b->id_bairro ?></td>
                <td><?= $b->nome_bairro ?></td>
                <td><?= $b->getNomeUnidade() ?></td>
                <td>
                    <a href="form_bairro.php?update=<?= $b->id_bairro ?>" 
                        class="btn text-dark mr-2" title="editar <?= $b->bairro_nome ?>">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>