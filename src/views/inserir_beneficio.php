<main class="content">
<?php
    renderTitle(
        'Gerenciar Benefícios da Pessoa',
        'Adicione ou altere os dados',
        'icofont-settings-alt'
    );
    include_once(TEMPLATE_PATH."\\messages.php");
?>
    <form action="" method="post">
        <input type="hidden" name="id_pessoa" value="<? $id_pessoa ?>">
        <div class="form-row">
            <div class="form-group col-md-4 mr-4">
            <?php foreach($beneficiosTipo as $ben): ?>
                <label for="<?= $ben->nome_beneficio ?>"><?= $ben->nome_beneficio ?></label>
                <?php $valor = '#codigo_'. $ben->id_beneficio ?>
                <input type="text" class="form-control" placeholder="0,00" 
                    name="<?= $valor ?>" 
                    value="<?php foreach($bps as $bp){
                        if($bp->ben_pes == $ben->id_beneficio){
                            echo $bp->valor_beneficio;
                        }
                    } 
                    ?>" id="<?= $ben->id_beneficio ?>">
            <?php endforeach ?>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button> 
            <a href="bucar_pessoa.php" class="btn btn-secondary btn-lg">Cancelar</a>              
        </div>
    </form>
</main>