<main class="content">
    <?php
        renderTitle(
            'Abrir nova lista de agendamentos',
            'Insira os dados para abrir uma nova agenda',
            'icofont-calendar'
        );

        include_once(TEMPLATE_PATH."\\messages.php");
    ?>
    <form action="" method="POST">
        <div class="lead mb-3">
            Escolha uma data disponível e a quantidade de visitas que poderão ser realizadas neste dia.
        </div>
        <div class="form-row">
            <input type="hidden" name="id_agenda" value="<?= $id_agenda ?>">
            <input type="hidden" name="unidade_agenda" value="<?= $unidade->id_unidade ?>">
            <div class="form-group col-md-2">
                <label for="data_agenda">Data Prevista</label>
                <input type="date" name="data_agenda" id="" value="<?= $data_agenda ?>"
                    class="form-control <?= $errors['data_agenda']?'is-invalid':''?>">
                <div class="invalid-feedback">
                    <?= $errors['data_agenda'] ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="quantidade_agenda">Qtd de visitas por dia</label>
                <input type="number" name="quantidade_agenda" value="<?= $quantidade_agenda ?>"
                    class="form-control <?= $errors['quantidade_agenda']?'is-invalid':''?>">
                <div class="invalid-feedback">
                    <?= $errors['quantidade_agenda'] ?>
                </div>
            </div>
        </div>
        <div class="form-row mt-2">
            <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
            <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
        </div>
    </form>
</main>