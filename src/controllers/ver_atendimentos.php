<?php
ini_set('display_errors',0);
session_start();
requiredValidSession();
loadModel('Atendimento');

$exception = null;

$itens_por_pagina = 10;
$num_total = Atendimento::getCount();
$num_paginas = ceil($num_total/$itens_por_pagina);
$pagina = intval($_GET['pagina']);
$inicio = $pagina * $itens_por_pagina;

if(isset($_GET['funcionario'])){
    if($_SESSION['user']->nivel_acesso == 3){
        $atendimentos = Atendimento::registrosPorPagina(
            $inicio, $itens_por_pagina, null,
            $_SESSION['unidade']->id_unidade
        );
    }elseif($_SESSION['user']->nivel_acesso > 3){
        $atendimentos = Atendimento::registrosPorPagina(
            $inicio, $itens_por_pagina, null, null);
    }else{
        
        $atendimentos = Atendimento::registrosPorPagina(
            $inicio, $itens_por_pagina,
            $_SESSION['user']->id_funcionario, null
        );
    }
}else{
    $atendimentos = Atendimento::registrosPorPagina(
        $inicio, $itens_por_pagina,
        $_SESSION['unidade']->id_unidade
    );
}

loadTemplateView('ver_atendimentos', [ 'atendimentos'=>$atendimentos]);