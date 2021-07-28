<main class="content">
<?php
    renderTitle(
        'Formulário de Benefícios',
        $_GET['update'] ? 'Insira os dados para alterar o benefício' : 'Insira os dados para incluir um benefício',
        'icofont-ui-rating text-warning'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>

<form action="" method="post">
    <input type="hidden" name="id_beneficio" value="<?= $id_beneficio ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nome_beneficio">Nome do Benefício</label>
            <input type="text" name="nome_beneficio" class="form-control <?= $errors['nome_beneficio'] ? 'is-invalid' : '' ?>" 
                value="<?= $nome_beneficio ?>" >
            <div class="invalid-feedback">
                <?= $errors['nome_beneficio'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="sigla_beneficio">Sigla</label>
            <input type="text" name="sigla_beneficio" class="form-control  <?= $errors['sigla_beneficio'] ? 'is-invalid' : '' ?>" 
                value="<?= $sigla_beneficio ?>">
            <div class="invalid-feedback" >
                <?= $errors['sigla_beneficio'] ?>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="ambito_beneficio">Âmbito</label>
            <select name="ambito_beneficio" id="ambito_beneficio" class="form-control <?= $errors['ambito_beneficio'] ? 'is-invalid' : '' ?>">
                <optgroup>
                    <option value="null" selected disabled>Selecione a esfera</option>
                    <option value="Federal" <?= $ambito_beneficio === 'Federal' ? 'selected' : '' ?>>Federal</option>
                    <option value="Estadual" <?= $ambito_beneficio === 'Estadual' ? 'selected' : '' ?>>Estadual</option>
                    <option value="Municipal" <?= $ambito_beneficio === 'Municipal' ? 'selected' : '' ?>>Municipal</option>
                    <option value="Outra" <?= $ambito_beneficio === 'Outra' ? 'selected' : '' ?>>Outra</option>
                </optgroup>
            </select>
            <div class="invalid-feedback d-block" id="ambito_beneficio">
                <?= $errors['ambito_beneficio'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="criterios_elegibilidade">Critérios de Elegibilidade</label>
                <textarea name="criterios_elegibilidade" id="" class="form-control" 
                placeholder="Elenque os critérios de elegibilidade para as equipes" 
                value=""><?= $criterios_elegibilidade ?></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <input type="checkbox" name="ativo_beneficio" class="mx-3 mt-4"
                <?= $ativo_beneficio ? 'checked' : '' ?>>
            <label for="ativo_beneficio">Ativo</label>
        </div>
    </div>
    <div class="mt-2">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="gerenciar_beneficio.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>
</main>