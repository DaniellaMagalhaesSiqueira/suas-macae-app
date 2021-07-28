<?php
ini_set('display_errors', 1);
session_start();
requiredValidSession();
loadModel("Pessoa");
$exception = null;
$pesValues = [];


if(count($_POST) == 0 && isset($_GET['update'])){
    $pessoa = Pessoa::getOne(['id_pessoa'=> $_GET['update']]);
    $pesValues = $pessoa->getValues();
    $benpes = $pessoa->getBeneficios();
    
}

elseif(count($_POST)>0) {
    $pessoa = new Pessoa($_POST);
    $val = limpaValorMonetario($_POST['renda']);
    $pessoa->renda = $val;
    if($pessoa->id_pessoa){
        $pessoa->update();
        $_POST = [];
        addSuccessMsg("A pessoa foi alterada com sucesso");
        header("Location: home.php");
        exit();
    }else{
        $idPes = $pessoa->insert();       
        $_POST = [];
        addSuccessMsg("A pessoa foi adicionada com sucesso");
        header("Location: home.php");
        exit();
    }
        
    // if($_POST['composicao'] == "RF" && $_GET['familia']){
    //         header("Location: inserir_familia");
    // }
        
}


loadTemplateView('inserir_pessoa',
['beneficios' => $beneficios, 'exception' => $exception, 'benpes' => $benpes] + $pesValues + $bens);
