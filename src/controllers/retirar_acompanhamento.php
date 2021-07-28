<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
loadModel('Familia');
loadModel('Acompanhamento');
$exception = null;


if(isset($_GET['acompanhamento'])){
    $acompanhamento = Acompanhamento::getOne(['id_acompanhamento'=> $_GET['acompanhamento']]);
    $familia = Familia::getOne(['id_familia'=> $acompanhamento->familia_acompanhamento]);
    addWarningMsg('Insira uma data válida para desligar um acompanhamento');
}
if(isset($_POST['fim_acompanhamento'])){
    try{
        if($_SESSION['user']->id_funcionario === $acompanhamento->funcionario_acompanhamento){
            $familia = Familia::getOne(['id_familia'=> $acompanhamento->familia_acompanhamento]);
            $acompanhamento = Acompanhamento::getOne(['id_acompanhamento'=> $_GET['acompanhamento']]);
            $acompanhamento->fim_acompanhamento = $_POST['fim_acompanhamento'];
            $acompanhamento->desligar();
            $acompanhamento->update();
            addSuccessMsg("Acompanhamento da família de {$familia->getRF()->nome_pessoa} foi encerrado");
            header("Location: ver_acompanhamentos.php");
            exit();
        }else{
            addErrorMsg('Apenas o técnico que inseriu essa família em acompanhamento pode executar essa ação');
        }
    }catch(Exception $e){
        $exception = $e;
    }
}

loadTemplateView('retirar_acompanhamento',[
    'exception'=>$exception,
    'familia'=>$familia, 
    'acompanhamento'=>$acompanhamento
]);