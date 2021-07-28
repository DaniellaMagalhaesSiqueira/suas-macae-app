<main class="content">
    <?php 
        renderTitle(
            'Agendamento de <b>Visita Domiciliar</b>',
            'Verifique se há vagas para agendamento',
            'icofont-car-alt-3'
        );

        include_once(TEMPLATE_PATH."\\messages.php");
    ?>
<form action="" method="post">
    <input type="hidden" name="familia_agendamento" value="<?= $familia->id_familia ?>">
    <input type="hidden" name="tecnico_agendamento" value="<?= $tecnico->id_funcionario ?>">
    <input type="hidden" name="unidade_agendamento" value="<?= $_SESSION['unidade']->id_unidade ?>">
    <div class="form-row">
        <div class="form-group col-md-4"> 
            <ul class="list-group">
                <li class="list-group-item list-group-item-action active"><i class="icofont-calendar mr-2"></i>Agendas disponíveis </li>
                <?php foreach($agendas as $a): ?>
                <li class="list-group-item">
                    <?= $a->data_agenda . $a->dia_semana . ' com ' . $a->vagas_agenda .' vagas' ?>
                    <input type="radio" name="agenda_agendamento" class="ml-2" value="<?= $a->id_agenda ?>">
                </li>
                <?php endforeach ?>
            </ul>
            
        </div>
        <div class="form-group col-md-5">
            Referência Familiar: <?= $rf->nome_pessoa ?><br>
            <label for="logradouro">Endereço:</label><br>
            <?=$familia->tipo_endereco . ' '.$familia->logradouro . ', Nº '. $familia->num_endereco .', '.$familia->complemento_endereco ?><br>
            <?='ponto de referência: '. $familia->ponto_referencia ?>
        </div>
    </div>
    <div class="form-group col-md-6">
        <?= $errors['agenda_agendamento'] ? "<input type='text' value='{$errors["agenda_agendamento"]}' class='form-control text-danger'>":"" ?>
        <?= $errors['familia_agendamento'] ? "<input type='text' value='{$errors["familia_agendamento"]}' class='form-control text-danger'>":"" ?>
    </div>
    <div class="form-group col-md-12 displpay-flex justify-self-center">
        <button class="btn btn-success btn-lg my-3 mx-3" id="salvar">Confirmar Agendamento</button> 
        <a href="buscar_familia.php" class="btn btn-secondary btn-lg mr-3">Cancelar</a>
    </div>

</form>
</main>