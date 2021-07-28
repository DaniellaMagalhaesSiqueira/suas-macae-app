<main class="content">
<?php
    renderTitle(
        'Formulário de bairros',
        $_GET['update'] ? 'Altere os dados do bairro' :  'Insira os dados do novo bairro',
        'icofont-ui-map'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
<form action="" method="post">
<input type="hidden" name="id_bairro" value="<?= $_GET['update'] ?>">
    <div class="form-row" id="adicionado">
        <div class="form-group col-md-3">
            <label for="nome_bairro">Nome do Bairro</label>
            <input type="text" class="form-control" name="nome_bairro"
                 value="<?= $nome_bairro ?>" <?= $errors['nome_bairro'] ? 'is-invalid' : '' ?>>
            <div class="invalid-feedback">
                <?= $errors['nome_bairro'] ?>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="nome_bairro">Abrangência</label>
            <select name="unidade_bairro" id="unidade_bairro" class="form-control">
                <optgroup>
                    <option value="null" selected>Sem Abrangência</option>
                    <?php foreach($unidades as $u) : ?>
                    <option value="<?= $u->id_unidade ?>" <?= $unidade_bairro === $u->id_unidade ? 'selected' : '' ?>>
                        <?= $u->nome_unidade ?></option>
                    <?php endforeach ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div>
        <button class="btn btn-primary btn-lg">Salvar</button> 
        <a href="abrangencia.php" class="btn btn-secondary btn-lg ml-3">Cancelar</a>              
    </div>
</form>
</main>