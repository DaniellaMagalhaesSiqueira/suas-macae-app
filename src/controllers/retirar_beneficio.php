<?php
ini_set("display_errors", 0);
session_start();
requiredValidSession(2);
loadModel("Pessoa");
loadModel("BeneficioPessoa");
$exception = null;
$pessoa = Pessoa::getOne(['id_pessoa' => $_GET['update']]);
$bps = $pessoa->getBeneficios();
if(count($_POST)>0){
    try{
        foreach($bps as $bp){
            if($_POST[$bp->id_beneficio_pessoa]){
                var_dump($beneficio);
                BeneficioPessoa::deleteById($bp->id_beneficio_pessoa, 'id_beneficio_pessoa'); 
            }
        }
    }catch(Exception $e){
        $exception = $e;
    }
    addSuccessMsg("Beneficio(s) excluído(s) com sucesso.");
    header("Location: home.php");
    exit();
}

loadTemplateView("retirar_beneficio", ['bps'=> $bps]);