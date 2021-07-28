<?php
ini_set('display_errors',0);    
session_start();
requiredValidSession(2);
loadModel("Familia");
loadModel("Pessoa");


$exception = null;

if(isset($_GET['familia'])){
    $familia = Familia::getOne(['id_familia' => $_GET['familia']]);
    $familiaValues = $familia->getValues();
}
try{  
    $pessoas = Pessoa::getDesvinculadaBanco();
}catch(Exception $e){
    $exception = $e;
}


loadTemplateView('inserir_pessoa_banco',[
    'pessoas'=> $pessoas, 
    'exception' => $exception, 
    'id_familia' => $familia->id_familia
] + $familiaValues);