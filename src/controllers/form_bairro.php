<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(4);
loadModel('Unidade');
loadModel('Bairro');
$bairroValues = [];
$unidades = Unidade::get(['ativo_unidade' => 1]);
$exception = null;

if(count($_POST)==0 && $_GET['update']){
    $bairro = Bairro::getOne(['id_bairro' => $_GET['update']]);
    $bairroValues = $bairro->getValues();
}
elseif(count($_POST)>0){
    $bairro = new Bairro ($_POST);
    try{
        if(!$bairro->id_bairro || $bairro->id_bairro === ''){
            $bairro->id_bairro = null;
            $bairro->insert();
            addSuccessMsg('Bairro inserido com sucesso.');
            header('Location: abrangencia.php');
            exit();
        }else{
            $bairro->update();
            addSuccessMsg('Bairro atualizado com sucesso.');
            header('Location: abrangencia.php');
            exit();
        }
    }catch(Exception $e){
        $exception = $e;
    }finally{
        $bairroValues = $_POST;
    }
}

loadTemplateView('form_bairro', 
    ['unidades' => $unidades, 'exception' => $exception] + $bairroValues);