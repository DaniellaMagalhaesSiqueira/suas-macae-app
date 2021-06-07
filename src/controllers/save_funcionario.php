<?php
// ini_set('display_errors', 1);
session_start();
requiredValidSession();
$exception = null;
$unidades = Unidade::get();

if(count($_POST)>0){
    try{
        $func = new Funcionario($_POST);
        $func->insert();
        addSuccessMsg('Funcionário Cadastrado com Sucesso. 
            Lembre-se que a primeira senha é o CPF sem pontos e traço.');
        $_POST = [];

    }catch(Exception $e){
        $exception = $e;
    }
}

loadTemplateView('save_funcionario', $_POST + ['unidades' => $unidades, 'exception'=>$exception]);

