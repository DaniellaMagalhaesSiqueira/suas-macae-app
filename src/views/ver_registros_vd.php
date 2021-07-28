<main class="content">
    <?php
        renderTitle(
            'Registros de Visitas Domiciliares',
            'Selecione um filtro para ver os registros',
            'icofont-archive'
        );
        include_once(MESSAGES_PATH);
       
    ?>
<form action="">
    <div class="show-list">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th>Código</th>
                <th>Data do Registro</th>
                <th>Pessoa de Referência</th>
                <th>Bairro</th>
                <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vds as $v):?>
                <tr>
                <td><?= $v->id_vd ?></td>
                <td><?= (new DateTime($v->data_vd))->format('d/m/Y') ?></td>
                <td><?= $v->nome_pessoa ?></td>
                <td><?= $v->nome_bairro ?></td>
                <td>
                    <a href="form_visita.php?visita=<?= $v->id_vd ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="editar">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
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
</form>
</main>