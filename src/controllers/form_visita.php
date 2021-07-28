<?php

ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
loadModel('Visita');
loadModel('Familia');
loadModel('Pessoa');

$hoje = date('Y-m-d');
$exception = null;


if(count($_POST)==0 && $_GET['familia']){
    $familia = Familia::getOne(['id_familia'=>$_GET['familia']]);
}
elseif(count($_POST)==0 && $_GET['visita']){
    $visita = Visita::getOne(['id_vd'=>$_GET['visita']]);
    $familia = Familia::getOne(['id_familia'=> $visita->familia_vd]);
    $rf = Pessoa::getOne(['id_pessoa'=>$familia->referencia_familiar]);
}
elseif(count($_POST)>0){
    $visita = new Visita($_POST);
    $visita->familia_vd = $familia->id_familia;
    $visita->unidade_vd = $_SESSION['unidade']->id_unidade;
    $visita->tecnico_vd = $_SESSION['user']->id_funcionario;
    if($visita->id_visita){
        $visita->update();
        addSuccessMsg('Registro de visita alterado com sucesso.');
    }else{
        $visita->insert();
        addSuccessMsg('Registro de visita inserido com sucesso');
    }
}

loadTemplateView('form_visita', ['familia'=>$familia, 'rf'=>$rf, 'hoje' => $hoje, 'visita'=> $visita]);