<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();
loadModel('Rede');
$exception = null;
$redeValues = [];

if(count($_POST)==0 && $_GET['rede']){
    $rede = Rede::getOne(['id_rede'=>$_GET['rede']]);
    $redeValues = $rede->getValues();

}elseif(count($_POST)>0){
    // try{
    //     $rede = new Rede($_POST);
    
    //     if($rede->id_rede){
    //         $rede->update();
    //         addSuccessMsg('Instituição atualizada com sucesso.');
    //         header('Location: buscar_rede.php');
    //         exit();
    //     }else{
    //         $rede->insert();
    //         addSuccessMsg('Instituição inserida com sucesso.');
    //         header('Location: buscar_rede.php');
    //         exit();
    //     }
    // }catch(Exception $e){
    //     $exception = $e;
    // }finally{
    //     $redeValues = $_POST;
    // }
}

loadTemplateView('visualizar_rede',['exception' => $exception] + $redeValues);