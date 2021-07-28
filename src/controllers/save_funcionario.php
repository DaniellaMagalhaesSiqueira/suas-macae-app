<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(3);
$exception = null;
$unidades = Unidade::get();

$funcValues = [];

if(count($_POST) == 0 && isset($_GET['update'])){
    $func = Funcionario::getOne(['id_funcionario' => $_GET['update']]);
    $funcValues = $func->getValues();
}

elseif(count($_POST)>0){
    try{
        $func = new Funcionario($_POST);
        if($func->id_funcionario){
            $func->ativo_funcionario = $_POST['ativo_funcionario'] == 'on' ? 1 : $func->ativo_funcionario;
            $func->update(false);
            addSuccessMsg('Funcionário alterado com Sucesso.');
            header("Location: manager_funcionario.php");
            exit();
        }else{
            $func->ativo_funcionario = 1;
            $func->insert();
            addSuccessMsg('Funcionário cadastrado com Sucesso. 
            Lembre-se que a primeira senha é o CPF sem pontos e traço.');
            $_POST = [];
            header("Location: manager_funcionario.php");
            exit();
        }

    }catch(Exception $e){
        $exception = $e;
    }finally{
        $funcValues = $_POST;
    }
}

loadTemplateView('save_funcionario',
    ['unidades' => $unidades, 'exception'=>$exception] 
    + $funcValues);

