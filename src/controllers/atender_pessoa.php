<?php
ini_set('display_errors',0);
session_start();
requiredValidSession();
loadModel('Pessoa');
loadModel('Atendimento');
loadModel('Funcionario');
loadModel('Unidade');
loadModel('Acompanhamento');
loadModel('Encaminhamento');
loadModel('Familia');
loadModel('Rede');
loadModel('Unidade');

$exception = null;
$today = date('Y-m-d');
$unidade = $_SESSION['unidade'];
$acompanhemento = null;
$proprio = null;
$atendimento = null;
$funcionario = $_SESSION['user'];


if(count($_POST)==0 && $_GET['pessoa']){
    $pessoa = Pessoa::getOne(['id_pessoa'=> $_GET['pessoa']]);
    $familia = Familia::getOne(['id_familia' => $pessoa->familia_pessoa]);
    $tipoFuncionario = $funcionario->nivel_acesso >= 2 ? 'Atendimento Técnico' : 'Atendimento de Cadastro';
    $funcionario = $_SESSION['user'];
}
elseif(count($_POST)==0 && $_GET['atendimento']){
    $atendimento = Atendimento::getOne(['id_atendimento'=> $_GET['atendimento']]);
    $pessoa = Pessoa::getOne(['id_pessoa'=>$atendimento->pessoa_atendimento]);
    $familia = Familia::getOne(['id_familia' => $pessoa->familia_pessoa]);
    $funcionario = Funcionario::getOne(['id_funcionario'=>$atendimento->funcionario_atendimento]);
    $tipoFuncionario = $funcionario->nivel_acesso >= 2 ? 'Atendimento Técnico' : 'Atendimento de Cadastro';
    $encaminhamentos = Encaminhamento::get(['atendimento_encaminhamento'=> $atendimento->id_atendimento]);
}
if($familia->acompanhamento_familia == 1){
   
    $acompanhamento = Acompanhamento::getOne(['familia_acompanhamento'=> $familia->id_familia]);
    $tecnico = $acompanhamento->getTecnico();
    if($_SESSION['user']->id_funcionario !== $tecnico->id_funcionario) {
        $proprio = false;
    }else{
        $proprio = true;
    }
   
}
elseif(count($_POST)>0){
    if($_GET['pessoa']){
        $pessoa = Pessoa::getOne(['id_pessoa'=> $_GET['pessoa']]);
        $familia = Familia::getOne(['id_familia' => $pessoa->familia_pessoa]);
        $funcionario = $_SESSION['user'];
    }elseif($_GET['atendimento']){
        $atendimento = Atendimento::getOne(['id_atendimento' => $_GET['atendimento']]);
        $pessoa = Pessoa::getOne(['id_pessoa'=>$atendimento->pessoa_atendimento]);
        $familia = Familia::getOne(['id_familia' => $pessoa->familia_pessoa]);
        $funcionario = $_SESSION['user'];
        $encaminhamentos = Encaminhamento::get(['atendimento_encaminhamento'=> $atendimento->id_atendimento]);
    }
    if($familia->acompanhamento_familia == 1){
        $acompanhamento = Acompanhamento::getOne(['familia_acompanhamento'=> $familia->id_familia]);
        $tecnico = $acompanhamento->getTecnico();
        if($_SESSION['user']->id_funcionario !== $tecnico->id_funcionario) {
            $proprio = false;
        }else{
            $proprio = true;
        }
    }
    $atendimento = new Atendimento($_POST);
    try{
        //se for edição de um atendimento
        if($atendimento->id_atendimento){
            $atendimento->funcionario_atendimento = $funcionario->id_funcionario;
            $atendimento->pessoa_atendimento = $pessoa->id_pessoa;
            $atendimento->familia_atendimento = $familia->id_familia;
            $atendimento->unidade_atendimento = $unidade->id_unidade;
            $atendimento->update();
            $atendimento = Atendimento::getOne(['id_atendimento'=> $atendimento->id_atendimento]);
            $pessoa->ultimo_atendimento = $atendimento->id_atendimento;
            $pessoa->update();
        //se for um atendimento novo
        }else{
            $atendimento->funcionario_atendimento = $funcionario->id_funcionario;
            $atendimento->pessoa_atendimento = $pessoa->id_pessoa;
            $atendimento->familia_atendimento = $familia->id_familia;
            $atendimento->unidade_atendimento = $unidade->id_unidade;
            $id = $atendimento->insert();
            $atendimento = Atendimento::getOne(['id_atendimento'=> $id]);
            $pessoa->ultimo_atendimento = $atendimento->id_atendimento;
            $pessoa->update();
        }
        
        $acompanhamento = Acompanhamento::getOne(['familia_acompanhamento'=>$familia->id_familia]);
       
        //inserir em acompanhamento
        if($_POST['acompanhamento'] && $familia->acompanhamento_familia == 0 && !$acompanhamento){
            $acompanhamento = new Acompanhamento([
                'inicio_acompanhamento' => $_POST['data_acompanhamento'],
                'familia_acompanhamento' => $familia->id_familia,
                'funcionario_acompanhamento' => $funcionario->id_funcionario,
                'unidade_acompanhamento' => $_SESSION['unidade']->id_unidade
            ]);
            $familia->acompanhamento_familia = 1;
            $acompanhamento->insert();
        }
        //retirar de acompanhamento
        elseif($_POST['acompanhamento'] && $familia->acompanhamento_familia == 1 && !$acompanhamento->fim_acompanhamento){
            $acompanhamento = Acompanhamento::getOne(['familia_acompanhamento'=> $familia->id_familia]);
            $acompanhamento->fim_acompanhamento = $_POST['data_acompanhamento'];
            $acompanhamento->update();
            $familia->acompanhamento_familia = 0;
        //inserir em acompanhamento depois que já foi acompanhada e saiu
        }elseif($_POST['acompanhamento'] && $familia->acompanhamento == 1 && $acompanhamento->fim_acompanhamento){
            
            $acompanhamento = new Acompanhamento([
                'inicio_acompanhamento' => $_POST['data_acompanhamento'],
                'familia_acompanhamento' => $familia->id_familia,
                'funcionario_acompanhamento' => $funcionario->id_funcionario,
                'unidade_acompanhamento' => $_SESSION['unidade']->id_unidade,
                'fim_acompanhamento' => null
            ]);
            $acompanhamento->update();
            $familia->acompanhamento_familia = 1;
        }
        //se houver encaminhamentos
        for($i=1; $i<= $_POST['contador'];$i++){
            if($_POST['enc_'. $i]){
                $encaminhamento = new Encaminhamento([
                    'destino_encaminhamento' => $_POST['enc_'.$i],
                    'pessoa_encaminhamento' => $pessoa->id_pessoa,
                    'data_encaminhamento' => $_POST['data_atendimento'],
                    'familia_encaminhamento' => $familia->id_familia,
                    'atendimento_encaminhamento'=> $atendimento->id_atendimento
                ]);
                $encaminhamento->insert();
            }
        }
        if($pessoa->familia_pessoa){
            $familia->update();
        }
       
        if($familia->acompanhamento_familia && $encaminhamento){
            
            addSuccessMsg('Atendimento e encaminhamento de família acompanhada registrado com sucesso');
            header('Location: home.php');
            exit(); 
            
        }elseif($familia->acompanhamento_familia && !$encaminhamento){
            
            addSuccessMsg('Atendimento de família acompanhada registrado com sucesso'); 
            header('Location: home.php');
            exit(); 
            
        }elseif(!$familia->acompanhamento_familia && $encaminhamento){
            
            addSuccessMsg('Atendimento e encaminhamento registrado com sucesso'); 
            header('Location: home.php');
            exit(); 
        }else{
            addSuccessMsg('Atendimento registrado com sucesso'); 
            header('Location: home.php');
            exit(); 
        }
    }catch(Exception $e){
        $exception = $e;
    }finally{
        $_POST = [];
    }
}
echo $_POST['contador'];
loadTemplateView('atender_pessoa', [
    'today'=>$today,
    'tipoFuncionario' => $tipoFuncionario,
    'unidade'=> $unidade,
    'funcionario' => $funcionario,
    'acompanhamento' => $acompanhamento,
    'redes' => $redes,
    'unidades' => $unidades,
    'exception' => $exception,
    'pessoa'=>$pessoa,
    'familia' => $familia,
    'proprio' => $proprio,
    'atendimento'=> $atendimento,
    'encaminhamentos'=>$encaminhamentos
    ]);