<?php
ini_set("display_errors", 0);

session_start();
requiredValidSession(2);
loadModel("Pessoa");
loadModel("Familia");
loadModel("Bairro");
$user = $_SESSION['user'];
$exception = null;
$semAbrangencia = 7;
$outros = "";

$today = date('Y-m-d');
$unidade = Unidade::getOne(['id_unidade' => $user->unidade_funcionario]);
$nomeUnidade = $unidade->nome_unidade;
if($user->nivel_acesso >= 4){
    $bairros = Bairro::get();
}else{

    $bairros = Bairro::get(['unidade_bairro'=> $unidade->id_unidade]);
}

$totalBeneficios = 0.0;
$nomesBeneficios = [];
$pessoas = [];
$pesValues = [];
$rendaTotal = 0.0;
$percapita = 0.0;



if(count($_POST) == 0 && isset($_GET['pessoa'])){
    $pessoa = Pessoa::getOne(['id_pessoa' => $_GET['pessoa']]);
    $pesValues = $pessoa->getValues();
    $familiaValues = [];
}

elseif(count($_POST) == 0 && isset($_GET['update'])){
    try{
        $familia = Familia::getOne(['id_familia' => $_GET['update']]);
        $familiaValues = $familia->getValues();
        $outros = strpos($familia->forma_ingresso, 'utros:')? substr($familia->forma_ingresso, 7, -1):'';
        $pessoa = Pessoa::getOne(['id_pessoa' => $familia->referencia_familiar]);
        $pessoas = $familia->getPessoas();
        $rendaTotal = $familia->getTotalRenda();
        $percapita = $familia->getPercapita();
        $totalBeneficios = $familia->getTotalBeneficios();
        $nomesBeneficios = $familia->pegarNomesBeneficios();
        $unidade = $familia->getUnidade();
        $nomeUnidade = $unidade->nome_unidade;
        if(isset($_GET['composicao'])){
            $p = Pessoa::getOne(['id_pessoa' => $_GET['composicao']]);
            $pessoas = $familia->getPessoas();
            $rendaTotal = $familia->getTotalRenda();
            $percapita = $familia->getPercapita();
            $totalBeneficios = $familia->getTotalBeneficios();
            $nomesBeneficios = $familia->pegarNomesBeneficios();
            $p->familia_pessoa = $familia->id_familia;
            $p->ativo_pessoa = 1;
            $p->update();
            addSuccessMsg('Pessoa incluída com sucesso!');
        }
    }catch(Exception $e){
        $exception = $e;
    }
    
    if($unidade->id_unidade !== $familia->unidade_familia){
        addErrorMsg("Essa família está cadastrada em outra Unidade. Não é permitido fazer alterações");
    }

}
elseif(count($_POST)>0){
    $_POST['valor_moradia'] = limpaValorMonetario($_POST['valor_moradia']);

    try{        
        $_POST['unidade_familia'] = intval($_POST['unidade_familia']);
        $familia = new Familia($_POST);
        if($familia->id_familia){
            if($unidade->id_unidade !== $familia->unidade_familia){
                addErrorMsg("Essa família está cadastrada em outra Unidade. Não é permitido fazer alterações");
                header('Location: home.php');
            }

            $familia->ativo_familia = 1;
            $familia->update();
            addSuccessMsg('Família Atualizada com sucesso!');
         
            header("Location: home.php");
            exit();
        }else{
            //familia nova
            $pessoa = Pessoa::getOne(['id_pessoa' => $_GET['pessoa']]);
            $familia->referencia_familiar = $_GET['pessoa'];
            $familia->ativo_familia = 1;
            $familia->unidade_familia = $unidade->id_unidade;
            $idFamilia = $familia->insert();
            $pessoa->familia_pessoa = $idFamilia;
            $pessoa->ativo_pessoa = 1;
            $pessoa->rf = 1;
            $pessoa->update();
            addSuccessMsg("Família inserida com sucesso");
            header("Location: home.php");
            exit();
        }
    }catch(Exception $e){
        $exception = $e;
    }finally{
        $familiaValues = $_POST;
    }
}

loadTemplateView('form_familia', [
    'pessoa' => $pessoa,
    'pesValues' => $pesValues,
    'today' => $today, 
    'nomeUnidade' => $nomeUnidade,
    'bairros' => $bairros,
    'totalBeneficios' => $totalBeneficios,
    'nomesBeneficios' => $nomesBeneficios,
    'pessoas' => $pessoas,
    'percapita' => $percapita,
    'rendaTotal' => $rendaTotal,
    'exception' => $exception,
    'semAbrangencia' => $semAbrangencia,
    'outros' => $outros
    ] + $familiaValues);