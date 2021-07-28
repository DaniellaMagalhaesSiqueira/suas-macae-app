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
<<<<<<< HEAD
                        class="btn text-dark mr-2" title="editar <?= $func->nome_funcionario ?>">
                        <i class="icofont-edit"></i>
                    </a>
                    <?php echo $func->ativo_funcionario == 1 ? "<a href='desligamento_funcionario.php?update={$func->id_funcionario}'
                        class='btn' title='desligar {$func->nome_funcionario}'>
                        <i class='icofont-trash text-dark'></i>
                    </a>" : '' ?>
                    
=======
                        class="btn btn-warning text-light rounded-circle mr-2" title="editar <?= $func->nome_funcionario ?>">
                        <i class="icofont-edit"></i>
                    </a>
                    <a href="?update= <?= $func->id_funcionario ?>" onclick="confirmacaoDesligamento()"
                        class="btn btn-danger rounded-circle" title="desligar <?= $func->nome_funcionario ?>">
                        <i class="icofont-trash"></i>
                    </a>
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
                </td>
            </tr>
            <?php endforeach ?>              
        </tbody>
    </table>
</main>