<?php
ini_set('display_errors',0);
session_start();
requiredValidSession(3);
loadModel('Acompanhamento');
loadModel('Unidade');

$unidades = Unidade::get();
$acompanhamentos = [];



if(count($_POST)>0){
    $itens_por_pagina = 10;
    $num_paginas = ceil($num_total/$itens_por_pagina);
    $pagina = intval($_GET['pagina']);
    $inicio = $pagina * $itens_por_pagina;
    $acompanhamentos = Acompanhamento::get(['unidade_acompanhamento'=> $_POST['unidade']]);
    $num_total = count($acompanhamentos);
    $unidade = Unidade::getOne(['id_unidade'=> $_POST['unidade']]);
}


loadTemplateView('consulta_acompanhamento', ['acompanhamentos'=> $acompanhamentos, 'unidades'=>$unidades, 'unidade'=>$unidade]);