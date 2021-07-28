<main class="content">
<?php
    renderTitle(
        'Busca de Pessoa',
        $_GET['atender'] == 1 ? 'Ao lado da pessoa clique no ícone da pasta para atender':'Escolha um filtro e insira os dados para a busca',
        'icofont-search-user'
    );

    include_once(MESSAGES_PATH);
?>
<form action="" method="POST">
    <div class="form-group col-md-4">
        <label for="filtro_pessoa">Filtro</label>
        <select name="filtro_pessoa" id="filtro_pessoa" class="form-control" onchange="mudarTipoInput()">
            <optgroup>
                <option value="null" selected disabled>Selecione o Filtro</option>
                <option value="nome_pessoa">Nome</option>
                <option value="id_pessoa">Código</option>
                <option value="data_nascimento">Data de Nascimento</option>
                <option value="nis">NIS</option>
                <option value="cpf_pessoa">CPF</option>
            </optgroup>
        </select>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control" 
            name="pesquisa_pessoa" id="tipo-input" >
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
                <th>Data de Nascimento</th>
                <th>Composição Familiar</th>
                <th>Situação</th>
                <th>Unidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pessoas as $pes):?>
                <tr>
                <td><?= $pes->id_pessoa ?></td>
                <td><?= $pes->nome_pessoa ?></td>
                <td><?= $pes->data_nascimento ?></td>
                <td><?= $pes->composicao ==="RF"?"Referência Familiar":$pes->composicao ?></td>
                <td><?= $pes->familia_pessoa ? "vinculada":"desvinculada"?></td>
                <td><?php $pes->unidade_pessoa; ?></td>
                <td>
                    <a href="inserir_pessoa.php?update=<?= $pes->id_pessoa ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="editar">
                        <i class="icofont-edit"></i>
                    </a>
                    <a href="atender_pessoa.php?pessoa=<?= $pes->id_pessoa ?>"
                        class="btn text-dark" title="atender">
                        <i class="icofont-folder-open text-dark"></i>
                    </a>
                    <a href="inserir_beneficio.php?update=<?= $pes->id_pessoa ?>"
                        class="btn text-dark" title="adicionar benefício">
                        <i class="icofont-plus-circle"></i>
                    </a>
                    <a href="retirar_beneficio.php?update=<?= $pes->id_pessoa ?>"
                        class="btn text-dark" title="retirar benefício">
                        <i class="icofont-minus-circle"></i>
                    </a>
                </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</form>
</main>