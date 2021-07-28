<?php

ini_set('display_errors', 0);
session_start();
requiredValidSession(5);
loadModel('Beneficio');
$exception = null;
$beneficiosValues = [];

if(count($_POST) == 0 && $_GET['update']){
    $beneficio = Beneficio::getOne(['id_beneficio' => $_GET['update']]);
    $beneficiosValues = $beneficio->getValues();
}
elseif(count($_POST)>0){
    try{
        echo "post" . $_POST['ativo_beneficio'];
        $beneficio = new Beneficio($_POST);
        if(!$beneficio->id_beneficio){
            $beneficio->id_beneficio = null;
            $beneficio->ativo_beneficio = 1;
            $beneficio->insert();
            addSuccessMsg('Benefício inserido com sucesso.');
            header('Location: gerenciar_beneficios.php');
            exit();
        }else{
            $beneficio->update();
            echo "beneficio" . $beneficio->ativo_beneficio;
            addSuccessMsg('Benefício atualizado com sucesso.');
            header('Location: gerenciar_beneficios.php');
            exit();
        }


    }catch(Exception $e){
        $exception = $e;
    }finally{
        $beneficiosValues = $_POST;
    }
}

loadTemplateView('form_beneficio', ['exception' => $exception] + $beneficiosValues);