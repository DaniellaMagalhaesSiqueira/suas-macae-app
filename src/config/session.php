<?php

function requiredValidSession($requerNivel = 1){
    $user =  $_SESSION['user'];
   
    if(!isset($user)){
        header('Location: login.php');
        exit();
    }
    elseif($requerNivel > $user->nivel_acesso){
        addErrorMsg("Acesso negado");
        header('Location: home.php');
        exit();
    }
}