<main class="content">
    <?php
        renderTitle(
            "Agendamentos da(o) Técnica(o): {$tecnico->nome_funcionario}",
            "Para cancelar um agendamento selecione o ícone correspondente ao lado da família",
            "icofont-car-alt-3"
        );
        include_once(TEMPLATE_PATH."\\messages.php");
    ?>

<table class="table table-borded table-striped table-hover">
        <thead>
            <th>Referência Familiar</th>
            <th>Bairro</th>
            <th>Data do Agendamento</th>
            <th>Cancelar</th>
        </thead>
        <tbody>
            <?php foreach($agendamentos as $a):?>
            <tr>
                <td><?= $a->pegarFamilia()->getRF()->nome_pessoa ?></td>
                <td><?= $a->pegarFamilia()->getNomeBairro() ?></td>
                <td><?= $a->pegarAgenda()->dataFormatada() . $a->pegarAgenda()->diaSemana() ?></td>
                <td>
                    <a href="ver_agendamentos.php?cancelar=<?= $a->id_agendamento ?>" 
                        class="btn text-dark mr-2" title="Cancelar">
                        <i class="icofont-ui-delete"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>