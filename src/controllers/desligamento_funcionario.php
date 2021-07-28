<?php
ini_set("display_errors",0); 
session_start();
requiredValidSession(3);

$exception = null;
$funcValues = [];
$hoje = date('Y-m-d');


if(isset($_GET['update']) && count($_POST)==0){
    $func = Funcionario::getOne(['id_funcionario' => $_GET['update']]);
    $funcValues = $func->getValues();
}
elseif(isset($_POST['data_desligamento_funcionario'])){
    $func = Funcionario::getOne(['id_funcionario' => $_GET['update']]);
    try{
        $func->data_desligamento_funcionario = $_POST['data_desligamento_funcionario'];
        $func->desligado_por = $_SESSION['user']->id_funcionario;
        $func->update();
        $func->updateDesligamento();
        addSuccessMsg("Funcionário desligado com sucesso.");
        header("Location: manager_funcionario.php");
        exit();
    }catch(Exception $e){ 
        $exception = $e;
    }
}
echo $_SESSION['user']->id_funcionario;


loadTemplateView('desligamento_funcionario', $funcValues + ['exception'=>$exception, 'hoje'=>$hoje] + $_POST);