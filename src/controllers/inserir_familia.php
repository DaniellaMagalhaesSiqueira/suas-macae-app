<?php 
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
loadModel("Pessoa");
$exception = null;
try{  
    $pessoas = Pessoa::get(['ativo_pessoa'=>0, 'composicao'=> 'Referencia Familiar']);
}catch(Exception $e){
    $exception = $e;
}


loadTemplateView("inserir_familia", ['pessoas' => $pessoas, 'exception'=>$exception]);