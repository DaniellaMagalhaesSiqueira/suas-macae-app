<?php
ini_set("display_errors", 0);
session_start();
requiredValidSession();
loadModel('Agenda');
$unidade = $_SESSION['unidade'];

$exception = null;
$agendas = Agenda::get(['fechada_agenda' => 0, 'unidade_agenda'=>$unidade->id_unidade]);
foreach($agendas as $a){
    $a->data_agenda = (new DateTime($a->data_agenda))->format('d/m/Y');
}


loadTemplateView('ver_agenda', ['agendas'=>$agendas]);