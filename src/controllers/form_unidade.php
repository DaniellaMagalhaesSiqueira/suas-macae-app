<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(5);
loadModel('Unidade');
$exception = null;
$unidadeValues = [];

if(count($_POST) == 0 && $_GET['update']){
    $unidade = Unidade::getOne(['id_unidade' => $_GET['update']]);
    $unidadeValues = $unidade->getValues();
}
elseif(count($_POST)>0){

    try{
        if(!$_POST['data_inauguracao']){
            $_POST['data_inauguracao'] = null;
        }
        $unidade = new Unidade($_POST);
        //unidade nova
        if($unidade->id_unidade == ''){
            $unidade->id_unidade = null;
            $unidade->ativo_unidade = 1;
            $unidade->insert();
            if($unidade->tipo_unidade === 'CRAS'){
                addSuccessMsg('Unidade inserida com sucesso.');
                header('Location: abrangencia.php');
                exit();
            }else{
                addSuccessMsg('Unidade inserida com sucesso.');
                header('Location: home.php');
                exit();
            }
        }
        if($unidade->id_unidade){
            $unidade->ativo_unidade = 1;
            $unidade->update();
            addSuccessMsg('Unidade atualizada com sucesso');
            header('Location: home.php');
            exit();
        }

    }catch(Exception $e){
        $exception = $e;
    }finally{
        $unidadeValues = $_POST;
    }
}

loadTemplateView('form_unidade', ['exception' => $exception] + $unidadeValues);