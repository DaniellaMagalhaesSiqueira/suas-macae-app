<main class="content">
    <?php
        renderTitle(
            'Editar Perfil',
            'Atualize seus dados',
            'icofont-edit-alt'
        );
        include(TEMPLATE_PATH."\\messages.php");
    ?>
    <form action="#" method="post">
        <div class="form-row display-flex align-items-center">
            <div class="form-group col-md-4">
                <label for="email_funcionario">E-mail</label>
                <input type="email_funcionario" id="email-disable" name="email_funcionario"
                    class="form-control" value="<?= $user->email_funcionario ?>" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="senha_funcionario">Senha</label>
                    <input type="password" id="senha_funcionario" name="senha_funcionario"
                        class="form-control <?= $errors['senha_funcionario'] ? 'is-invalid':''?>">       
                <div class="invalid-feedback">
                    <?= $errors['senha_funcionario']?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="confirmacao_senha">Comfirmação de Senha</label>
                <input type="password" id="confirmacao_senha" name="confirmacao_senha"
                    class="form-control <?= $errors ['confirmacao_senha'] ? 'is-invalid':''?>">
            <div class="invalid-feedback">
                <?= $errors['confirmacao_senha']?>
            </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button> 
            <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
        </div>
    </form>
</main>