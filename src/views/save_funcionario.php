<main class="content">
    <?php
        renderTitle(
            'Cadastro de Funcionário',
            'Crie ou atualize o funcionário.',
            'icofont-user'
        );

<<<<<<< HEAD
        include(MESSAGES_PATH);
    ?>

    <form action="#" method="post" class="p-0">
        <input type="hidden" name="id_funcionario" value= <?= $id_funcionario ?>>
        <input type="hidden" name="ativo_funcionario" id="" value="<?= $ativo_funcionario ?>">
        <input type="hidden" name="senha_funcionario" id="" value="<?= $senha_funcionario ?>">
=======
        include(TEMPLATE_PATH."\\messages.php");
    ?>

    <form action="#" method="post" class="p-0" onkeydown="return event.key != 'Enter';">
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome_funcionario">Nome</label>
                <input type="text" id="nome_funcionario" name="nome_funcionario" placeholder=""
                    class="form-control <?= $errors['nome_funcionario'] ? 'is-invalid':''?>"
                    value="<?= $nome_funcionario ?>">
                <div class="invalid-feedback">
                    <?= $errors['nome_funcionario'] ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="data_nascimento_funcionario">Data de Nascimento</label>
                <input type="date" id="data_nascimento_funcionario" name="data_nascimento_funcionario" placeholder=""
                    class="form-control <?= $errors['data_nascimento_funcionario'] ? 'is-invalid':''?>"
<<<<<<< HEAD
                    value="<?= $data_funcionario ?>"
=======
                    value="<?= $data_data_funcionario ?>"
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
                    max="<?php echo date('Y-m-d', strtotime('-14 year')); ?>">
                <div class="invalid-feedback">
                    <?= $errors['data_nascimento_funcionario'] ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="cpf_funcionario">CPF</label>
                <input type="text" id="cpf_funcionario" name="cpf_funcionario" class="form-control 
                    <?= $errors['cpf_funcionario'] ? 'is-invalid':''?>" 
                    onkeypress="$(this).mask('000.000.000-00');"
                    value="<?= $cpf__funcionario ?>">
                <div class="invalid-feedback">
                    <?= $errors['cpf_funcionario'] ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="telefone_funcionario">Telefone</label>
                <input type="tel" id="telefone_funcionario" name="telefone_funcionario" placeholder="(00)00000-0000"
                    class="form-control <?= $errors['telefone_funcionario'] ? 'is-invalid':''?>" onkeypress="$(this).mask('(00)00000-0000')"
                    value="<?= $telefone_funcionario ?>">
                <div class="invalid-feedback">
                    <?= $errors['telefone_funcionario'] ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="escolaridade_funcionario">Escolaridade</label>
                <input type="text" id="escolaridade_funcionario" name="escolaridade_funcionario" placeholder=""
                    class="form-control <?= $errors['escolaridade_funcionario'] ? 'is-invalid':''?>"
                    value="<?= $escolaridade_funcionario ?>">
                <div class="invalid-feedback">
                    <?= $errors['escolaridade_funcionario'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="cargo">Cargo</label>
                <input type="text" id="cargo" cargo="cargo" name="cargo" placeholder=""
                    class="form-control <?= $errors['cargo'] ? 'is-invalid':''?>"
                    value="<?= $cargo ?>">
                <div class="invalid-feedback">
                    <?= $errors['cargo'] ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="profissao">Profissão</label>
                <input type="text" id="profissao" name="profissao" placeholder=""
                    class="form-control <?= $errors['profissao'] ? 'is-invalid':''?>"
                    value="<?= $profissão ?>">
                <div class="invalid-feedback">
                    <?= $errors['profissao'] ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="vinculo">Vínculo</label>
                <input type="text" id="vinculo" name="vinculo" placeholder=""
                    class="form-control <?= $errors['vinculo'] ? 'is-invalid':''?>"
                    value="<?= $vinculo ?>">
                <div class="invalid-feedback">
                    <?= $errors['vinculo'] ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="unidade_funcionario">Unidade</label>
                <select name="unidade_funcionario" id="unidade_funcionario" 
<<<<<<< HEAD
                    class="form-control">
                <optgroup>
                    <option value="null" selected disabled>Selecione a Unidade</option>
                    <?php foreach($unidades as $unidade):?>
                        <option value="<?= $unidade->id_unidade ?>" <?= $unidade_funcionario === $unidade->id_unidade? 'selected' : '' ?>>
=======
                class="form-control" value="<?= $unidade_funcionario ?>">
                <optgroup>
                    <option value="null" selected disabled>Selecione a Unidade</option>
                    <?php foreach($unidades as $unidade):?>
                        <option value="<?= $unidade->id_unidade ?>">
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
                            <?= $unidade->nome_unidade ?></option>
                            <?php endforeach ?>
                        </optgroup>
                    </select>
                    <div id="unidade_funcionario" class="invalid-feedback d-block">
                        <?= $errors['unidade_funcionario'] ?>
                    </div>
                </div>
            </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email_funcionario">E-mail</label>
                <input type="email" id="email_funcionario" name="email_funcionario" placeholder=""
                    class="form-control <?= $errors['email_funcionario'] ? 'is-invalid':''?>"
                    value="<?= $email_funcionario ?>">
                <div class="invalid-feedback">
                    <?= $errors['email_funcionario'] ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="nivel_acesso">Nível de Acesso</label>
                <select name="nivel_acesso" id="nivel_acesso" class="form-control">
                    <optgroup>
                        <option value="null" selected disabled>Escolha o nível de acesso</option>
                        <?php if($_SESSION['user']->nivel_acesso == 5):?>
                        <option value="5" <?= $nivel_acesso == 5 ?'selected':'' ?>>Gestão</option>
                        <option value="4" <?= $nivel_acesso == 4 ?'selected':'' ?>>Básica</option>
                        <option value="3" <?= $nivel_acesso == 3 ?'selected':'' ?>>Coordenação</option>
                        <option value="2" <?= $nivel_acesso == 2 ?'selected':'' ?>>Técnico</option>
                        <option value="1" <?= $nivel_acesso == 1 ?'selected':'' ?>>Médio</option>
                        <?php elseif($_SESSION['user']->nivel_acesso == 4):?>
                        <option value="3" <?= $nivel_acesso == 3 ?'selected':'' ?>>Coordenação</option>
                        <option value="2" <?= $nivel_acesso == 2 ?'selected':'' ?>>Técnico</option>
                        <option value="1" <?= $nivel_acesso == 1 ?'selected':'' ?>>Médio</option>
                        <?php elseif($_SESSION['user']->nivel_acesso == 3): ?>
                        <option value="2" <?= $nivel_acesso == 2 ?'selected':'' ?>>Técnico</option>
                        <option value="1" <?= $nivel_acesso == 1 ?'selected':'' ?>>Médio</option>
                        <?php endif ?>
                    </optgroup>
                </select>
                <div id="nivel_acesso" class="invalid-feedback d-block">
                    <?= $errors['nivel_acesso'] ?>
                </div>
            </div>
<<<<<<< HEAD
           
            <?= $ativo_funcionario == 0 ? ' <div class="form-group col-md-4 mt-4 ml-3">
                <label for="ativo_funcionario" >Reativar Funcionário?</label>
                <input type="checkbox" name="ativo_funcionario" class="form-check">
            </div>' : ''?>
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button> 
            <a href="manager_funcionario.php" class="btn btn-secondary btn-lg">Cancelar</a>              
        </div>
    </form>
</main>