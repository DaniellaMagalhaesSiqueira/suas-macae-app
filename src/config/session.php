<?php

<<<<<<< HEAD
function requiredValidSession($requerNivel = 1){
=======
function requiredValidSession(){
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
    $user =  $_SESSION['user'];
   
    if(!isset($user)){
        header('Location: login.php');
        exit();
    }
<<<<<<< HEAD
    elseif($requerNivel > $user->nivel_acesso){
        addErrorMsg("Acesso negado");
        header('Location: home.php');
        exit();
    }
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
}