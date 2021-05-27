<?php
loadModel('Login');
$exception = null;

ini_set('display_errors', 0);
if(count($_POST) > 0){
    $login = new Login($_POST);
    try{
        $func = $login->checkLogin(); 
        echo "Funcionário {$func->nome_funcionario} logado";
    }catch(AppException $e){
        $exception = $e;
    }
}
//podemos passar parâmetros para a view através de um array no loadView
loadView('login', $_POST + ['exception'=> $exception]);