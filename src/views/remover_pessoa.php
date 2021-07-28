<main class="content">
<?php
    renderTitle(
        'Remover pessoa da família',
        'Caso a remoção seja por motivo de óbito favor marcar a opção "é falecida".',
        'icofont-minus'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");

?>
<form action="#" method="post">
    <blockquote class="blockquote ml-3">
        A pessoa  de código <b class="text-danger"><?= $pessoa->id_pessoa ?></b> será removida da família de código <?= $_GET['familia'] ?>
    </blockquote>
    <div class="form-control form-group col-md-4 ml-3">
        <input type="checkbox" name='obito'>
        <label for="obito" class="ml-2"><?= $pessoa->nome_pessoa ?> é falecida</label>
    </div>
    <div class="form-group col-md-4">
        <label for="confirmacao">Para confirmar a exclusão da pessoa da família, 
            insira o código da pessoa abaixo:</label>
        <p class="text-muted">Ex.: 10</p>
        <div class="input-group-prepend">
          <div class="input-group-text">Código:</div>
            <input type="number" class="form-control" name="confirmacao">
        </div>
    </div>
    <div class="pt-2 mx-3">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>

</main>