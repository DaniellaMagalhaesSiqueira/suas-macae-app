<?php
// ini_set("display_errors", 1);

session_start();
requiredValidSession(2);
loadModel('Pessoa');

$exception = null;
$pessoas = Pessoa::get(['familia_pessoa' => $_GET['familia']]);


if(count($_POST)>0){
    $rf = null;
    try{
        $ps = [];
        foreach($pessoas as $p){
            $pessoa = Pessoa::getOne(['id_pessoa' => $p->id_pessoa]);
            $pessoa->composicao = $_POST[$p->id_pessoa];
            if($pessoa->composicao === "Referencia Familiar" && !$rf){
                $rf = $pessoa->id_pessoa;
            }elseif($p->composicao === "Referencia Familiar" && $rf){
                $e = 'Por favor, selecione apenas uma referência familiar';
                throw new Exception($e);
            }
            array_push($ps, $pessoa);
        }
        $familia = Familia::getOne(['id_familia'=> $_GET['familia']]);
        foreach($ps as $p){
            if($p->id_pessoa == $rf){
                $p->rf = 1;
                $familia->referencia_familiar = intval($p->id_pessoa);
                $familia->update();
                $p->update();
            }else{
                $p->rf = 0;
                $p->update();
            }
        }
        addSuccessMsg('Família atualizada com sucesso!');
        header(("Location: home.php"));
        exit();
    }catch(Exception $e){
        $exception = $e;
    }
}


loadTemplateView('alterar_rf', ['pessoas'=> $pessoas, 'exception' => $exception]);