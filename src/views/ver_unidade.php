<main class="content">
<?php 
    renderTitle(
        'Unidades Ativas do SUAS',
        '',
        'icofont-building'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");

?>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Tipo</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
        </thead>
        <tbody>
            <?php foreach($unidades as $u):?>
            <tr>
                <td><?= $u->tipo_unidade ?></td>
                <td><?= $u->nome_unidade ?></td>
                <td><?= $u->email_unidade ?></td>
                <td><?= $u->tel1_unidade?></td>
                <td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>

</main>