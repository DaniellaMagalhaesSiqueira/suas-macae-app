<main class="content">
    <?php
        renderTitle(
            'Retirar a família de acompanhamento',
            'Essa ação libera a família para acompanhamento de outro técnico',
            'icofont-archive'
        );
        include_once(MESSAGES_PATH);
    ?>
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="familia">Código: </label>
                <input type="text" disabled value="<?= $familia->id_familia ?>"  class="form-control" name="familia">
            </div>
            <div class="form-group col-md-4">
                <label for="familia">Referência Familiar</label>
                <input type="text" disabled value="<?= $familia->getRF()->nome_pessoa ?>" class="form-control" name="rf">
            </div>
            <div class="form-group col-md-2">
                <label for="fim_acompanhamento">Data de desligamento</label>
                <input type="date" class="form-control 
                    <?= $errors['fim_acompanhamento']? 'is-invalid':''?>" 
                    name="fim_acompanhamento" >
                <div class="invalid-feedback">
                    <?= $errors['fim_acompanhamento'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg">Desligar</button>
        </div>
    </form>
</main>