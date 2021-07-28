<?php
ini_set("display_errors", 0);
session_start();
requiredValidSession(2);
loadModel('Agenda');
loadModel('Agendamento');
loadModel('Familia');
loadModel('Pessoa');
$exception = null;
$unidade = $_SESSION['unidade'];
$user = $_SESSION['user'];
$familia = Familia::getOne(['id_familia'=> $_GET['familia']]);
$rf = Pessoa::getOne(['id_pessoa'=> $familia->referencia_familiar]);


$diasemana = array(' (Domingo)', ' (Segunda-feira)', ' (Terça-feira)', ' (Quarta-feira)', ' (Quinta-feira)', ' (Sexta-feira)', ' (Sábado)');
$agendas = Agenda::get(['fechada_agenda' => 0, 'unidade_agenda' => $unidade->id_unidade]);

foreach($agendas as $a){
    $diaNum = date('w', strtotime($a->data_agenda));
    $a->data_agenda = (new DateTime($a->data_agenda))->format('d/m/Y');
    $a->dia_semana = $diasemana[$diaNum];
}

if(count($_POST)>0){
    try{
        $agendamento = new Agendamento($_POST);
        $agendamento->fechado_agendamento = 0;
        $agendamento->insert();
        $agenda = Agenda::getOne(['id_agenda'=>$_POST['agenda_agendamento']]);
        $agenda->vagas_agenda -= 1;
        if($agenda->vagas_agenda == 0){
            $agenda->fechada_agenda = 1;
        }
        $agenda->update();
        $agenda->data_agenda = (new DateTime($agenda->data_agenda))->format('d/m/Y');
        $diaN = date('w', strtotime($agenda->data_agenda));
        addSuccessMsg("Visita Domiciliar agendada para o dia {$agenda->data_agenda} {$diasemana[$diaN]}");
        header('Location: ver_agendamentos.php');
        exit();
    }catch(Exception $e){
        $exception = $e;
    }
}

loadTemplateView('agendar_visita', [
    'agendas'=>$agendas,
    'familia'=> $familia, 
    'rf'=>$rf, 
    'unidade'=>$unidade,
    'tecnico' =>$user,
    'exception' => $exception
]);