<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
$user = $_SESSION['user'];
loadModel('Agendamento');
$unidade = $_SESSION['unidade'];
$agendamentos = Agendamento::get(['fechado_agendamento' => 0, 'unidade_agendamento'=> $unidade->id_unidade]);


loadTemplateView('ver_todos_agendamentos', [
    'agendamentos' => $agendamentos
]);