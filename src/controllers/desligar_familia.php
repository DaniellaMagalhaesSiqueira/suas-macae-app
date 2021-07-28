<?php
ini_set("display_errors", 1);
session_start();
requiredValidSession(2);
loadModel('Familia');


$exception = null;
$today = date('Y-m-d');

if(count($_POST)==0 && $_GET['familia']){
    $familia = Familia::getOne(['id_familia' => $_GET['familia']]);
    $famValues = $familia->getValues();
    $rf = Pessoa::getOne(['id_pessoa'=>$familia->referencia_familiar]);
    $nomeRF = $rf ->nome_pessoa;
}
elseif(count($_POST)>0){
    try{
        $familia = Familia::getOne(['id_familia' => $_GET['familia']]);
        $famValues = $familia->getValues();
        $rf = Pessoa::getOne(['id_pessoa'=>$familia->referencia_familiar]);
        $nomeRF = $rf ->nome_pessoa;
        $pessoas = $familia->getPessoas();
        foreach($pessoas as $p){
            $p->familia_pessoa = null;
            $p->ativo_pessoa = 0;
            $p->update();
        }
        $familia->data_desligamento = $_POST['data_desligamento'];
        $familia->motivo_desligamento = $_POST['motivo_desligamento'];
        $familia->ativo_familia = 0;
        $familia->updateDesligamento();
        addSuccessMsg('Família foi desligada da unidade');
        header("Location: home.php");
    }catch(Exception $e){
        $exception = $e;
    }
}


loadTemplateView('desligar_familia', ['today'=>$today, 'nomeRF'=>$nomeRF, 'exception'=> $exception] + $famValues);