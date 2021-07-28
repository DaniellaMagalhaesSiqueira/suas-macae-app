<main class="content">
<?php
    renderTitle(
        'Formulário de preenchimento de Unidade',
        $_GET['update'] ? 'Altere dos dados da Unidade' : 'Insira os dados da nova Unidade',
        'icofont-ui-home'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
<form action="#" method="post">
    <input type="hidden" name="id_unidade" value="<?= $id_unidade ?>">
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="nome_unidade">Nome da Unidade</label>
            <input type="text" value="<?= $nome_unidade ?>"
                class="form-control <?= $errors['nome_unidade'] ? 'is-invalid' : '' ?>" name="nome_unidade">
            <div class="invalid-feedback"><?= $errors['nome_unidade'] ?></div>
        </div>
        <div class="form-group col-md-4">
            <label for="id_governo">Identificação do Governo Federal</label>
            <input type="text" placeholder="Ex. ID CRAS" value="<?= $id_governo ?>"
                name="id_governo" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="data_inauguracao">Data de Criação</label>
            <input type="date" name="data_inauguracao" value = "<?= $data_inauguracao ?>"
                class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="email_unidade">E-mail</label>
            <input type="email" name="email_unidade" value="<?= $email_unidade ?>" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="tipo_unidade">Tipo de Unidade</label>
            <select name="tipo_unidade" id="tipo_unidade" 
                class="form-control <?= $errors['tipo_unidade'] ? 'is-invalid':'' ?>">
                <optgroup>
                    <option value="null" disabled selected>Selecione o tipo</option>
                    <option value="CRAS" <?= $tipo_unidade === 'CRAS'? 'selected': ''?>>CRAS</option>
                    <option value="CREAS" <?= $tipo_unidade === 'CREAS'? 'selected': ''?>>CREAS</option>
                    <option value="Centro POP" <?= $tipo_unidade === 'Centro POP'? 'selected': ''?>>Centro POP</option>
                    <option value="Centro-Dia" <?= $tipo_unidade === 'Centro-Dia'? 'selected': ''?>>Centro-Dia</option>
                    <option value="Unidade de Acolhimento" <?= $tipo_unidade === 'Unidade de Acolhimento'? 'selected': ''?>>Unidade de Acolhimento</option>
                    <option value="Unidade de Gestão" <?= $tipo_unidade === 'Unidade de Gestão'? 'selected': ''?>>Unidade de Gestão</option>
                </optgroup>
            </select>
            <div class="invalid-feedback d-block" id="tipo_unidade">
                <?= $errors['tipo_unidade'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="horario_funcionamento">Funcionamento</label>
            <input type="text" name="horario_funcionamento" class="form-control"
                placeholder="Ex.de 8 as 17 hs" value="<?= $horario_funcionamento ?>">
        </div>
        <label for="capacidade_atendimento" class="mt-4 ml-1">Capacidade de Atendimento</label>
        <div class="form-group col-md-1 mt-4">
            <input type="number" name="capacidade_atendimento"
                class="form-control" value="<?= $capacidade_atendimento ? $capacidade_atendimento : 0  ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="logradouro">Endereço</label>
            <input type="text" class="form-control" name="logradouro" value="<?= $logradouro ?>"
                placeholder="Ex. Rua Agripino Francisco Martins">
        </div>
        <div class="form-group col-md-1">
            <label for="num_endereco">Nº</label>
            <input type="number" name="num_endereco" class="form-control" value="<?= $num_endereco ? $num_endereco : 0 ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="bairro_unidade">Bairro</label>
            <input type="text" name="bairro_unidade" class="form-control" value="<?= $bairro ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="tel1_unidade">Telefone 1</label>
            <input type="text" name="tel1_unidade" class="form-control" value="<?= $tel1_unidade ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="tel2_unidade">Telefone 2</label>
            <input type="text" name="tel2_unidade" class="form-control" value="<?= $tel2_unidade ?>">
        </div>
    </div>
    <div class="form-row display-flex justify-content-end mt-4 mr-5">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>
</main>