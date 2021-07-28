<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();
loadModel("Pessoa");
$exception = null;
$pesValues = [];


//quando preenche os campos
if(count($_POST) == 0 && isset($_GET['update'])){
    $pessoa = Pessoa::getOne(['id_pessoa'=> $_GET['update']]);
    $pesValues = $pessoa->getValues(); 
}

elseif(count($_POST)>0) {
    $pessoa = new Pessoa($_POST);
    $pesValues = $pessoa->getValues();
    if($pessoa->id_pessoa === ''){
        $pessoa->id_pessoa = null;
    }
    if(!$pessoa->familia_pessoa){
        $pessoa->familia_pessoa = null;
    }
    $val = limpaValorMonetario($_POST['renda']);
    $pessoa->renda = $val;
    try{
        //se for pessoa do banco
        if($pessoa->id_pessoa){
            if($pessoa->composicao != "Referencia Familiar" && $pessoa->rf &&  $pessoa->familia_pessoa){
                $e = "Você está tentando alterar uma composição 'referência familiar' ativa nesta tela. 
                    Ela está vinculada a uma família. <br> Para esta alteração é necessário alterar a referencia familiar na família de código: ".$pessoa->familia_pessoa;
                throw new Exception($e);    
                
            }
            $pessoa->update();
            addSuccessMsg("A pessoa foi alterada com sucesso");
            header("Location: home.php");
            exit();
             //se for pessoa nova
        }
        else{
            if($_GET['familia']){
                $pessoa->familia_pessoa = $_GET['familia'];
                if($pessoa->composicao === 'Referencia Familiar'){
                    $e = "Não é possível ter duas referências familiares na mesma família.<br> Por favor troque a composição familiar.";
                    throw new Exception ($e);
                }
            }
            $pessoa->ativo_pessoa = 1;
            $pessoa->insert();
            addSuccessMsg("A pessoa foi adicionada com sucesso");
            $_POST = [];
            header("Location: home.php");
            exit();
        }
        }catch(Exception $e){
            $exception = $e;
        }finally{
            $pesValues = $_POST;
        }
    }

loadTemplateView('inserir_pessoa', ['exception' => $exception] + $pesValues);

