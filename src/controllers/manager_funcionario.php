<?php
ini_set("display_errors", 0);
session_start();
<<<<<<< HEAD
requiredValidSession(3);
$exception = null;

if(isset($_GET['update'])){
try{ 
    }catch(Exception $e){
        if(stripos($e->getMessage(), "FOREIGN_KEY")){
            addErrorMsg("----");
        }else{
            $exception = $e;
        }
    }
}
$user = $_SESSION['user'];
$unidade = $_SESSION['unidade'];
$ativos = $user->porNivel();

=======
requiredValidSession();
$user = $_SESSION['user'];
$unidade = $_SESSION['unidade'];
$ativos = $user->getAtivosNivel();
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
foreach($ativos as $func){
    if($func->data_nascimento_funcionario){
        $func->data_nascimento_funcionario =
             (new DateTime($func->data_nascimento_funcionario))->format('d/m/Y');
    }
}


<<<<<<< HEAD
loadTemplateView('manager_funcionario', ['ativos'=>$ativos, 'exception' => $exception]);
=======
loadTemplateView('manager_funcionario', ['ativos'=>$ativos]);
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
