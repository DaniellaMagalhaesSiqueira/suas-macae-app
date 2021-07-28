<main class="content">
    <?php
        renderTitle(
            'Consulta a Famílias em Acompanhamento por Unidade',
            'Selecione a Unidade para gerar uma lista das Famílias em Acompanhamento',
            'icofont-search-document'
        );
        include_once(MESSAGES_PATH);
    ?>
<form action="#" method="POST">
    <div class="form-group col-md-4">
        <label for="unidade">Unidade</label>
        <select name="unidade" id="unidade" class="form-control">
            <optgroup>
                <option value="null" selected disabled>Selecione uma Unidade</option>
                <?php foreach($unidades as $u): ?>
                    <option value="<?= $u->id_unidade ?>"><?= $u->nome_unidade ?></option>
                <?php endforeach ?>
            </optgroup>
        </select>
    </div>
    <div>
        <button class="btn btn-primary btn-lg mx-3" id="show-pesquisa" type="submit">Buscar</button>
        <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>
    </div>
</form>
<form action="">
    <div class="show-list">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th>Código da Familia</th>
                <th>Referência Familiar</th>
                <th>Data de Início</th>
                <th>Renda Per Capita</th>
                <th>Qtd Pessoas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($acompanhamentos as $a):?>
                    <tr>
                <td><?= $a->getFamilia()->id_familia ?></td>
                <td><?= $a->getFamilia()->getRF()->nome_pessoa ?></td>
                <td><?= (new DateTime($a->inicio_acompanhamento))->format('d/m/Y') ?></td>
                <td><?= $a->getFamilia()->getPercapita() ?></td>
                <td><?= $a->getFamilia()->getQuantidade() ?></td>
            </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Navegação de página">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="ver_registros_vd.php?pagina=0">Anterior</a></li>
            <?php for($i=0; $i<$num_paginas; $i++):?>
                <li class="<?= $pagina == $i?'active':''?> page-item"><a class="page-link" href="ver_registros_vd.php?pagina=<?=$i ?>"><?= $i + 1 ?></a></li>
            <?php endfor ?>
            <li class="page-item"><a class="page-link" href="ver_registros_vd.php?pagina=<?= $paginas-1 ?>">Próximo</a></li>

        </ul>
    </nav>
    <div>
        <a href="rel_acompanhadas_unidade.php?unidade=<?= $_POST['unidade']?>" class="btn btn-lg btn-primary">Gerar Relatório</a>
    </div>
</form>
</main>