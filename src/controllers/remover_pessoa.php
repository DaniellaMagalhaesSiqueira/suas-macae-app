<?php
ini_set('display_errors', 0);

loadModel('Familia');
loadModel('Pessoa');
session_start();
requiredValidSession(2);
$familia = Familia::getOne(['id_familia'=> $_GET['familia']]);
$pessoa = Pessoa::getOne(['id_pessoa' => $_GET['pessoa']]);

if($pessoa->rf){
    addErrorMsg('Por favor altere a composição familiar da pessoa a ser excluída, não é possível excluir uma referência familiar de família ativa');
    header("Location: form_familia.php?update=".$_GET['familia']);
    exit();
}

if(count($_POST)>0){
    if(!$_POST['confirmacao']){
        addErrorMsg('Por favor insira o código da pessoa a ser excluída para confirmação');
    }
    elseif($_POST['confirmacao'] !== $pessoa->id_pessoa){
        addErrorMsg('O código da pessoa que selecionou não está correto');
    }
    else{
        if($_POST['obito']){
            $pessoa->estado = 'obito';
        }
        $pessoa->ativo_pessoa = 0;
        $pessoa->familia_pessoa = null;
        $pessoa->update();
        addSuccessMsg("Pessoa removida com sucesso.");
        header("Location: form_familia.php?update=".$_GET['familia']);
        exit();
        
    }
}


loadTemplateView('remover_pessoa', ['pessoa' => $pessoa]);