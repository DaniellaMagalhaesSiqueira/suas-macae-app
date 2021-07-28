<?php

function addSuccessMsg($msg){
    $_SESSION['message'] = [
        'type' => 'success',
        'message' => $msg
    ];
}

function addErrorMsg($msg){
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $msg
    ];
<<<<<<< HEAD
}
function addWarningMsg($msg){
    $_SESSION['message'] = [
        'type' => 'warning',
        'message' => $msg
    ];
}

function limpaValorMonetario($strValor){
    if(!$strValor){
        return 0.0;
    }
    if(strpos($strValor,".")){
        $strValor = str_replace(".", "", $strValor);
        $strValor = str_replace(",", ".", $strValor);
    }else{
        $strValor = str_replace(",", ".", $strValor);
    }
     return doubleval($strValor);
}

function criaValorMonetario($valorBanco){
    if(strpos($valorBanco, '.')){
        $valorBanco = str_replace('.', ',', $valorBanco);
    }
    return strval($valorBanco);
}
=======
}
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
