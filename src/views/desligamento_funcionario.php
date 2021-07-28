<main class="content">
    <?php
        renderTitle(
            "Desligamento de Funcionário",
            "Insira a data em que o funcionário foi desligado.",
            "icofont-ui-delete"
        );

        require_once(TEMPLATE_PATH."\\messages.php");
        // <?= date('Y-m-d') 
    ?>
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="nome_funcionario">Nome</label>
                <input type="text" name="nome_funcionario" class="form-control" value="<?= $nome_funcionario ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="data_desligamento_funcionario">Data de Desligamento</label>
                <input type="date" name="data_desligamento_funcionario" 
                    class="form-control <?= $errors['data_desligamento_funcionario'] ? 'is-invalid':''?>" value="">
                    <div class="invalid-feedback">
                    <?= $errors ['data_desligamento_funcionario'] ?>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button> 
            <a href="manager_funcionario.php" class="btn btn-secondary btn-lg">Cancelar</a> 
        </div>
    </form>
</main>