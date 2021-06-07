<main class="content">
    <?php
        renderTitle(
            'Gerenciamento de Funcionários',
            'Funcionários Ativos',
            'icofont-users'
        );
        include(TEMPLATE_PATH."\\messages.php");
    ?>
    <a href="save_funcionario.php" 
        class="btn btn-lg btn-primary mb-3">Novo Funcionário</a>
    <table class="table table-borded table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Nível Acesso</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Nascimento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach($ativos as $func):?>
            <tr>
                <td><?= $func->nome_funcionario ?></td>
                <td><?= $func->nome_cargo ?></td>
                <td><?= $func->getNivel() ?></td>
                <td><?= $func->telefone_funcionario?></td>
                <td><?= $func->email_funcionario ?></td>
                <td><?= $func->data_nascimento_funcionario ?></td>
                <td>
                    <a href="save_funcionario.php?update=<?= $func->id_funcionario ?>" 
                        class="btn btn-warning text-light rounded-circle mr-2" title="editar <?= $func->nome_funcionario ?>">
                        <i class="icofont-edit"></i>
                    </a>
                    <a href="?update= <?= $func->id_funcionario ?>" onclick="confirmacaoDesligamento()"
                        class="btn btn-danger rounded-circle" title="desligar <?= $func->nome_funcionario ?>">
                        <i class="icofont-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>