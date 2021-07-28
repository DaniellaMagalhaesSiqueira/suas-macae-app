<main class="content">
<?php
renderTitle(
    'Gerenciar Rede Referenciada - Serviços, Programas ou Instituições',
    'Mantenha os dados atualizados para melhorar a qualidade do atendimento técnico',
    'icofont-network'
);

    include_once(TEMPLATE_PATH."\\messages.php");
?>
 <a href="form_rede.php" 
        class="btn btn-lg btn-primary mb-3">Nova Instituição</a>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Natureza</th>
            <th>Setor</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Situação</th>
            <th>Editar</th>
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
                <td>
                    <a href="form_rede.php?update=<?= $r->id_rede ?>" 
                        class="btn text-dark mr-2" title="editar <?= $r->nome_rede ?>">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>