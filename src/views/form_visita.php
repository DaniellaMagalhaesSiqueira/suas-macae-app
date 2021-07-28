<main class="content">
    <?php
        renderTitle(
            'Formulário de registro de Visita Domiciliar',
            'Insira os dados para registrar no sistema a visita domiciliar realizada',
            'icofont-car-alt-3'
        );

        include_once(MESSAGES_PATH);
    ?>

    <form action="" method="post">
        <input type="hidden" name="id_vd" value="<?= $visita->id_vd ?>">
        <input type="hidden" name="id_vd" value="<?= $visita->id_vd ?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="pessoa_referencia">Nome</label>
                <input type="text" disabled value="<?= $rf->nome_pessoa ?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="pessoa_referencia">Endereço</label>
                <input type="text" disabled value="<?= $familia->tipo_endereco.' '
                . $familia->logradouro . 
                ', Nº '. $familia->num_endereco . ', ' .$familia->getNomeBairro() ?>" class="form-control">
                
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="pessoa_vd">Pessoa de contato</label>
                <input type="text" name="pessoa_vd" id="" placeholder="quem recebeu a(o) técnica(o)" class="form-control" value="<?= $visita->pessoa_vd ?>">
                <input type="checkbox" name="efetivada_vd" class="mt-4 ml-2" <?= !$visita->id_vd || $visita->efetivada_vd == 1 ? 'checked':''?>>
                <label for="efetivada_vd"><b>Conseguiu fazer a visita?</b></label>
            </div>
            <div class="form-group col-md-2">
                <label for="data_vd">Data da Visita</label>
                <input type="date" name="data_vd" class="form-control" value="<?= $visita->data_vd ? $visita->data_vd : $hoje ?>">
                
            </div>
            <div class="form-group col-md-3">
                <div class="jumbotron p-3">
                    <div class="container ">
                        <h1 class="lead">Demanda Principal da Visita:</h1>
                        <input type="radio" name="demanda_vd" value="Acompanhamento"
                            classe="form-check-input" id="acompanhamento" <?= strpos($visita->demanda_vd, "companhamento")?'checked':'' ?>>
                        <label for="acompanhamento" class="form-check-label" id="Acompanhamento">Acompanhamento</label><br>
                        <input type="radio" name="demanda_vd" value="Busca Ativa"
                            classe="form-check-input " id="busca" <?= strpos($visita->demanda_vd, "usca Ativa") ?'checked':'' ?>>
                        <label for="busca" class="form-check-label " id="busca">Busca Ativa</label><br>
                        <input type="radio" name="demanda_vd" value="CAD Único"
                            classe="form-check-input" id="cad" <?= strpos($visita->demanda_vd, "nico")?'checked':'' ?>>
                        <label for="cad" class="form-check-label" id="cad">CAD Único</label><br>
                        <input type="radio" name="demanda_vd" value="SCFV"
                            classe="form-check-input" id="pbf" <?= strpos($visita->demanda_vd, "Bolsa Fam")?'checked':'' ?>>
                        <label for="pbf" class="form-check-label" id="pbf">Bolsa Família</label><br>
                        <input type="radio" name="demanda_vd" value="SCFV"
                            classe="form-check-input" id="scfv" <?= strpos($visita->demanda_vd, "CFV")?'checked':'' ?>>
                        <label for="scfv" class="form-check-label" id="scfv">SCFV</label><br>
                        <input type="radio" name="demanda_vd" value="Violação de Direitos"
                            classe="form-check-input" id="violacao" <?= strpos($visita->demanda_vd, "o de Direitos")?'checked':'' ?>>
                        <label for="violacao" class="form-check-label" id="violacao">Violação de Direitos</label><br>
                        <input type="radio" name="demanda_vd" value="Solicitação da Família"
                            classe="form-check-input" id="solicitacao" <?= strpos($visita->demanda_vd, "olicita")?'checked':'' ?>>
                        <label for="solicitacao" class="form-check-label" id="solicitacao">Solicitação da Família</label><br>
                    </div>
                </div>      
            </div>
        </div>
        <span class="text-muted"></span>
        <div class="form-row">
            <button class="btn btn-primary btn-lg mx-3">Registrar</button> 
            <a href="ver_registros_vd.php" class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
    </form>
</main>