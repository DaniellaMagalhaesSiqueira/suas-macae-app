<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
loadModel("Beneficio");
loadModel("BeneficioPessoa");

$beneficiosTipo = Beneficio::get();
$pessoa = Pessoa::getOne(['id_pessoa' => $_GET['update']]);
$bps = $pessoa->getBeneficios();
$idB = [];

foreach($bps as $bp){

    array_push($idB, $bp->ben_pes);
}
$pesValues = $pessoa->getValues();
$exception = null;
if(count($_POST)>0){
    foreach($beneficiosTipo as $b){
        $valor = '#codigo_'. $b->id_beneficio;
        if($_POST[$valor]){
            try{
                $valor = limpaValorMonetario($_POST[$valor]);
                $beneficio = new BeneficioPessoa([
                    'ben_pes' =>$b->id_beneficio,
                    'pes_ben' => $_GET['update'],
                    'valor_beneficio' => $valor
                ]);
                //beneficio do banco
                if(in_array($b->id_beneficio, $idB)){
                    
                    foreach($bps as $bp){
                        if($bp->ben_pes === $b->id_beneficio){
                            $beneficio = BeneficioPessoa::getOne(['id_beneficio_pessoa' => $bp->id_beneficio_pessoa]);
                        }
                    }
                    $beneficio->valor_beneficio = $valor;
                    $beneficio->update();
                //benefício novo
                }else{

                    if($beneficio->id_beneficio_pessoa == ''){
                        $beneficio->id_beneficio_pessoa = null;
                    }

                    $beneficio->insert();
                }
            }catch(Exception $e){
                $exception = $e;
            }finally{
                $pessoa->id_pessoa = $_POST['id_pessoa'];
            }
        }
    }
    addSuccessMsg('Benefício salvo com sucesso.');
    header("Location: home.php");
    exit();
    
}

loadTemplateView('inserir_beneficio', [
    'exception' => $exception, 
    'beneficiosTipo' => $beneficiosTipo, 'bps' => $bps]);