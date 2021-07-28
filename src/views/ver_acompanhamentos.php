<main class="content">
<?php
    renderTitle(
        "Famílias acompanhadas por {$_SESSION['user']->nome_funcionario}",
        'Também é possível inserir ou retirar a família do acompanhamento ao atender qualquer pessoa de sua composição.',
        'icofont-tack-pin'
    );

    include_once(MESSAGES_PATH);
    ?>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Referência Familiar</th>
            <th>Bairro</th>
            <th>Data de Início</th>
            <th>Deixar de Acompanhar</th>
        </thead>
        <tbody>
            <?php foreach($acompanhamentos as $a):?>
            <tr>
                <td><?= $a->getFamilia()->getRF()->nome_pessoa ?></td>
                <td><?= $a->getFamilia()->getNomeBairro() ?></td>
                <td><?= (new DateTime($a->inicio_acompanhamento))->format('d-m-Y') ?></td>
                <td>
                    <a href="retirar_acompanhamento.php?acompanhamento=<?= $a->id_acompanhamento ?>" 
                        class="btn text-dark mr-2" title="Cancelar">
                        <i class="icofont-archive"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>