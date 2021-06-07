<?php
ini_set("display_errors", 0);
session_start();
requiredValidSession();
$user = $_SESSION['user'];
$unidade = $_SESSION['unidade'];
$ativos = $user->getAtivosNivel();
foreach($ativos as $func){
    if($func->data_nascimento_funcionario){
        $func->data_nascimento_funcionario =
             (new DateTime($func->data_nascimento_funcionario))->format('d/m/Y');
    }
}


loadTemplateView('manager_funcionario', ['ativos'=>$ativos]);