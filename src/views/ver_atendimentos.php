<main class="content">
    <?php
    renderTitle(
        "Registros de Atendimentos",
        'É possível inserir ou retirar a família do acompanhamento ao atender qualquer pessoa de sua composição.',
        'icofont-ui-folder'
    );

    include_once(MESSAGES_PATH);
    ?>
    <form action="">
    <div class="show-list">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th>Código</th>
                <th>Data do Atendimento</th>
                <th>Pessoa Atendida</th>
                <?php
                if($_SESSION['user']->nivel_acesso > 2){
                    echo "<th>Bairro</th>";
                }
                ?>
                <?php if($_SESSION['user']->nivel_acesso <= 2){
                    echo "<th>Editar</th>";
                }elseif($_SESSION['user']->nivel_acesso == 3){
                        echo  "<th>Técnica(o)</th>";
                        echo "<th>Editar</th>";
                    }else{
                        echo  "<th>Técnica(o)</th>";
                        echo  "<th>Unidade</th>";
                    }
                ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($atendimentos as $a):?>
                <tr>
                <td><?= $a->id_atendimento ?></td>
                <td><?= (new DateTime($a->data_atendimento ))->format('d/m/Y') ?></td>
                <td><?= $a->nome_pessoa ?></td>
                <?php
                if($_SESSION['user']->nivel_acesso > 2){
                    echo "<td>".$a->nome_bairro."</td>";
                }
                ?>
                <?php if($_SESSION['user']->nivel_acesso <= 2){
                    echo "<td><a href='atender_pessoa.php?atendimento=".$a->id_atendimento."' 
                    class='btn text-dark mr-2 rounded-circle' title='editar'>
                    <i class='icofont-edit'></i>
                    </a></td>";
                }elseif($_SESSION['user']->nivel_acesso == 3){
                    echo  "<td>".$a->nome_funcionario."</td>";
                    if($a->nome_funcionario == $_SESSION['user']->nome_funcionario){
                        echo "<td><a href='atender_pessoa.php?atendimento=". $a->id_atendimento ."' 
                        class='btn text-dark mr-2 rounded-circle' title='editar'>
                        <i class='icofont-edit'></i>
                        </a></td>";
                    }
                    }else{
                        echo  "<td>".$a->nome_funcionario."</td>";
                        echo  "<td>".$a->nome_unidade."</td>";
                    }
                ?>
                
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="ver_atendimentos.php?pagina=0">Anterior</a></li>
            <?php for($i=0; $i<$num_paginas; $i++):?>
                <li class="<?= $pagina == $i?'active':''?> page-item"><a class="page-link" href="ver_atendimentos.php?pagina=<?=$i ?>"><?= $i + 1 ?></a></li>
            <?php endfor ?>
            <li class="page-item"><a class="page-link" href="ver_atendimentos.php?pagina=<?= $paginas-1 ?>">Próximo</a></li>

        </ul>
    </nav>
</form>
</main>