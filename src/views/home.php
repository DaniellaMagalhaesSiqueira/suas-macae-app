<main class="content">
    <?php
    session_start();
    $nomeUnidade = $_SESSION['unidade'] -> nome_unidade;
    renderTitle(
        $nomeUnidade,
        $_SESSION['user']->getNivel(),
        'icofont-checked'
    );
    ?>
    <div class="card">
        <div class="card-header">
            <h3></h3>
            <p class="mb-0">Escolha as ações que deseja realizar</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-around">
                <a href="#" class="btn btn-primary">Gerenciar Famílias</a>
                <a href="#" class="btn btn-primary">Gerenciar Pessoas</a>
                <a href="#" class="btn btn-primary">Gerenciar Funcionários</a>
            </div>
        </div>
    </div>
</main>