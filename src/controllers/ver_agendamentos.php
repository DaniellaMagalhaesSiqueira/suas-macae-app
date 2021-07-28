<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
$tecnico = $_SESSION['user'];
loadModel('Agendamento');
$agendamentos = Agendamento::get(['fechado_agendamento' => 0, 'tecnico_agendamento'=> $tecnico->id_funcionario]);

if(isset($_GET['cancelar'])){
    $agendamento = Agendamento::getOne(['id_agendamento'=>$_GET['cancelar']]);
    $agendamento->delete();
    addSuccessMsg('Agendamento cancelado');
    $agendamentos = Agendamento::get(['fechado_agendamento' => 0, 'tecnico_agendamento'=> $tecnico->id_funcionario]);
}

loadTemplateView('ver_agendamentos', [
    'tecnico'=> $tecnico,
    'agendamentos' => $agendamentos
]);