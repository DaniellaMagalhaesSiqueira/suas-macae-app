<main class="content">
<?php
    renderTitle(
        'Buscar Família',
        $subtitulo,
        'icofont-search-property'
    );
    include_once(MESSAGES_PATH);
?>

<form action="" method="POST">
    <div class="form-group col-md-4">
        <label for="filtro_pessoa">Filtro</label>
        <select name="filtro_pessoa" id="filtro_pessoa" class="form-control" onchange="mudarTipoInput()">
            <optgroup>
                <option value="null" selected disabled>Selecione o Filtro</option>
                <option value="referencia_familiar">Nome da Referência Familiar</option>
                <option value="id_familia">Código</option>
                <option value="data_nascimento">Data de Nascimento do Responsável Familiar</option>
                <option value="cpf_pessoa">CPF do Responsável Familiar</option>
                <option value="unidade">Unidade de Referência</option>
                <option value="desligadas">Desligadas</option>
            </optgroup>
        </select>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control" 
            name="pesquisa_familia" id="tipo-input" >
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
                <th>Código</th>
                <th>Pessoa de Referência</th>
                <th>Quant. Pessoas</th>
                <th>Situação</th>
                <th>Unidade</th>
                <th>Editar</th>
                <th>Agendar Visita</th>
                <th>Registrar Visita</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($familias as $f):?>
                <tr>
                <td><?= $f->id_familia ?></td>
                <td><?= $f->getRF()->nome_pessoa ?></td>
                <td><?= $f->getQuantidade() ?></td>
                <td><?= $f->ativo_familia == 1 ? "ativa" : "desligada"?></td>
                <td><?php echo $f->getUnidade()->nome_unidade; ?></td>
                <td>
                    <a href="form_familia.php?update=<?= $f->id_familia ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="editar">
                        <i class="icofont-edit"></i>
                    </a>
                <td><a href="agendar_visita.php?familia=<?= $f->id_familia ?>"
                        class="btn text-dark" title="visitar">
                        <i class="icofont-calendar"></i>
                    </a></td>
                <td><a href="form_visita.php?familia=<?= $f->id_familia ?>"
                        class="btn text-dark" title="registrar">
                        <i class="icofont-ui-home"></i>
                    </a></td>
               
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</form>
</main>