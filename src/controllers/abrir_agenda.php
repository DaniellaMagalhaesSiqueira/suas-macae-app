<?php

ini_set("display_errors", 0);
session_start();
requiredValidSession(2);
loadModel('Agenda');
$unidade = $_SESSION['unidade'];

$exception = null;
$agendaValues = [];

if(count($_POST)== 0 && $_GET['agenda']){
    $agenda = Agenda::getOne(['id_agenda'=>$_GET['agenda']]);
    $agendaValues = $agenda->getValues();
    $qtd = $agenda->quantidade_agenda;
    $vaga = $agenda->vagas_agenda;
}


elseif(count($_POST)>0){
    $agenda = new Agenda($_POST);

    try{
        if($agenda->id_agenda){
        echo "entrou aqui<br>";
            $agenda->fechada_agenda = 0;
            if($qtd > $_POST['quantidade_agenda']){
                $agenda->vagas_agenda = $vaga - ($qtd - $_POST['quantidade_agenda']);
            }else{
                $agenda->vagas_agenda = $vaga + ($_POST['quantidade_agenda'] - $qtd);
            }
            $agenda->update();
            addSuccessMsg('Alteração executada com sucesso.');
            header('Location: home.php');
            exit();
        }else{
            $agenda->fechada_agenda = 0;
            $agenda->vagas_agenda = $_POST['quantidade_agenda'];
            $agenda->insert();
            addSuccessMsg("Agenda aberta com {$_POST['quantidade_agenda']} vagas");
            header('Location: home.php');
            exit();
        }
    }catch(Exception $e){
        $exception = $e;
    }
}
loadTemplateView('abrir_agenda', ['exception'=> $exception, 'unidade' => $unidade] + $agendaValues);