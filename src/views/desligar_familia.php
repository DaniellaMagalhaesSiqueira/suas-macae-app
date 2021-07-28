<main class="content">
<?php
    renderTitle(
        'Desvincular família dessa unidade',
        'Insira a data de desligamento e motivo de desligamento',
        'icofont-close-squared-alt'
    );

    include_once(TEMPLATE_PATH."\\messages.php");
?>
<form action="#" method="post">
    <blockquote class="blockquote">
        <label for="id_familia" >Família de Código <?= $id_familia?> a ser desligada.</label><br>
        <label for="id_familia" >Referência Familiar: <?= $nomeRF?></label>
    </blockquote>    
    <div class="form-row">
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label for="data_desligamento">Data de desligamento</label>
        <input type="date" name="data_desligamento" class="form-control 
            <?= $errors['data_desligamento'] ? 'is-invalid': '' ?>" value="<?= $today ?>">
        <div class="invalid-feedback">
                <?= $errors['data_desligamento'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="motivo_desligamento">Motivo do desligamento</label>
            <textarea type="text" class="form-control <?= $errors['motivo_desligamento'] ? 'is-invalid': '' ?>" 
                name="motivo_desligamento"></textarea>
            <div class="invalid-feedback">
                <?= $errors['motivo_desligamento'] ?>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            O que acontece com as pessoas da família desligada?
        </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p class="lead">Ao ser desligada de sua unidade anterior 
            todas as pessoas da família passam a ficar com o status inativo. Isso significa
            que todas elas estarão disponíveis para vinculação em nova família</p>
        <p class="lead">Caso alguma pessoa tenha falecido, favor informar antes de seu desligamento
            efetuando busca a essa família e desligando-a da família por motivo de óbito</p>
        </blockquote>
        </div>
    </div>
    <div class="form-row display-flex justify-content-end mt-2">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>

</main>