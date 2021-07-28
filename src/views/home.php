<main class="content">
    <?php
    session_start();
    $nomeUnidade = $_SESSION['unidade'] -> nome_unidade;
    renderTitle(
        $nomeUnidade,
        $_SESSION['user']->getNivel(),
        'icofont-checked'
    );
    include_once(MESSAGES_PATH);
    ?>
    <div class="card">
        <div class="card-header">
            <h3></h3>
            <p class="mb-0">Escolha as ações que deseja realizar</p>
        </div>
        <div class="card-body">
            <div class="container p-3">
            <div class="row ">
                <div class="col">
                    <a href="ver_atendimentos.php?funcionario=<?= $_SESSION['user']->id_funcionario?>" class="btn btn-primary  btn-block btn-block"><i class="icofont-ui-folder mr-1 text-light"></i>Ver Meus Atendimentos</a>
                </div>
                <div class="col">
                    <a href="#" class="btn btn-primary  btn-block"><i class="icofont-users-alt-3 mr-1 text-light"></i>Ver Famílias Acompanhadas</a>
                </div>
            </div>
            </div>
            <div class="container p-3 ">
                <div class="row">
                    <div class="col">
                        <a href="buscar_familia.php?atender=1" class="btn btn-primary  btn-block"><i class="icofont-search-folder text-light mr-3"></i>Atender uma Família</a>
                    </div>
                    <div class="col">
                        <a href="buscar_pessoa.php?atender=1" class="btn btn-primary  btn-block"><i class="icofont-search-folder text-light mr-3"></i>Atender uma Pessoa</a>
                    </div>
                    <div class="col">
                        <a href="abrir_agenda.php" class="btn btn-primary  btn-block"><i class="icofont-ui-calendar mr-2 text-light"></i>Abrir Agenda de Visita Domiciliar</a>
                    </div>
                    
                </div>
            </div>
            <div class="container p-3">
            <div class="row ">
                <div class="col">
                    <a href="ver_agenda.php" class="btn btn-primary  btn-block btn-block"><i class="icofont-ui-calendar mr-1 text-light"></i>Ver Agenda de Visita Domiciliar</a>
                </div>
                <div class="col">
                    <a href="ver_rede.php" class="btn btn-primary  btn-block"><i class="icofont-connection mr-1 text-light"></i>Consultar Rede</a>
                </div>
                <div class="col">
                        <a href="ver_beneficios.php" class="btn btn-primary  btn-block"><i class="icofont-star mr-1 text-light"></i>Ver Benefícios</a>
                    </div>
            </div>
            </div>
        </div>
    </div>
</main>