<main class="content">
<?php
    renderTitle(
        'Retirar registro de benefício',
        'Selecione o benefício a ser excluído',
        'icofont-settings-alt'
    );
    include_once(TEMPLATE_PATH."\\messages.php");
?>
<form action="" method="post">
<ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-primary">
        <?php if(count($bps)>0){
         echo "Benefícios Cadastrados";
        }  else{
            echo "A pessoa não tem benefícios cadastrados";
        }
            ?>
    </li>
    <?php foreach($bps as $bp): ?>
    <li class="list-group-item">
    <input type="checkbox" class="form-check-input" 
        name="<? echo $bp->id_beneficio_pessoa ?>" id="<? $bp->id_beneficio_pessoa ?>">
    <label for="<? $bp->id_beneficio_pessoa ?>" 
        class="form-check-label mr-2">
        <?php echo $bp->getNome() ?>
    </label>
        <label for="<? $bp->valor_beneficio ?>" 
        class="form-check-label">
        <?php echo "R$ ". $bp->valor_beneficio ?>
    </label>
  </li>
  <?php endforeach ?>
</ul>
<div class=" mt-3">
    <button class="btn btn-primary btn-lg mr-3">Excluir Benefícios Selecionados</button> 
    <a href="buscar_pessoa.php" class="btn btn-secondary btn-lg">Cancelar</a>              
</div>
</form>
</main>