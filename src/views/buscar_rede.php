<main class="content">
    <?php
        renderTitle(
            'Busca de Rede Referenciada',
            'Escolha um filtro para busca',
            'icofont-search-2'
        );

        include_once(TEMPLATE_PATH . "\\messages.php");
    ?>
    <form action="" method="POST">
    <div class="form-group col-md-4">
        <label for="filtro_pessoa">Filtro</label>
        <select name="filtro_pessoa" id="filtro_pessoa" class="form-control" onchange="mudarTipoInput()">
            <optgroup>
                <option value="null" selected disabled>Selecione o Filtro</option>
                <option value="id_rede">Código</option>
                <option value="nome_rede">Nome</option>
                <option value="setor_rede">Setor</option>
                <option value="publico_rede">Publico</option>
                <option value="contato_rede">Contato</option>
            </optgroup>
        </select>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control" 
            name="pesquisa_rede" id="tipo-input" >
    </div>
    <div class="box-rede">

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
                <th>Nome</th>
                <th>Situação</th>
                <th>Contato</th>
                <th>Telefone</th>
                <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($redes as $r):?>
                <tr>
                <td><?= $r->id_rede ?></td>
                <td><?= $r->nome_rede ?></td>
                <td><?= $r->ativo_rede==1?'Ativa': 'Inativa' ?></td>
                <td><?= $r->contato_rede ?></td>
                <td><?= $r->tel1_rede ?></td>
                <td>
                    <a href="visualizar_rede.php?rede=<?= $r->id_rede ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="ver">
                        <i class="icofont-search"></i>
                    </a>
                </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</form>
</main>