<main class="content">
    <?php
        renderTitle(
            'Agendas abertas',
            'Clique no ícone de editar para alterar a agenda',
            'icofont-calendar'
        );

        include_once(TEMPLATE_PATH."\\messages.php");
    ?>

<table class="table table-borded table-striped table-hover">
        <thead>
            <th>Código</th>
            <th>Data</th>
            <th>Qtd</th>
            <th>Vagas</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php foreach($agendas as $a):?>
            <tr>
                <td><?= $a->id_agenda ?></td>
                <td><?= $a->data_agenda ?></td>
                <td><?= $a->quantidade_agenda ?></td>
                <td><?= $a->vagas_agenda ?></td>
                <td><a href="abrir_agenda.php?agenda=<?= $a->id_agenda ?>" 
                        class="btn text-dark mr-2" title="editar">
                        <i class="icofont-edit"></i>
                    </a></td>
        </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>