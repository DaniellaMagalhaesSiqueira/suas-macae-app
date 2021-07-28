<main class="content">
<?php
renderTitle(
    'Serviços, Programas ou Instituições',
    '',
    'icofont-network'
);

    include_once(TEMPLATE_PATH."\\messages.php");
?>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Natureza</th>
            <th>Setor</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Situação</th>
            
        </thead>
        <tbody>
            <?php foreach($redes as $r):?>
            <tr>
                <td><?= $r->nome_rede ?></td>
                <td><?= $r->natureza_rede ?></td>
                <td><?= $r->setor_rede ?></td>
                <td><?= $r->tel1_rede ?></td>
                <td><?= $r->email_rede?></td>
                <td><?= $r->ativo_rede ? 'Ativada':'Desativada' ?></td>
                
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>