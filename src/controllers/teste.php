<?php
ini_set("display_errors", 1);
session_start();
requiredValidSession();

$unidade = $_SESSION['unidade'];
$user = Funcionario::getOne(['id_funcionario'=> 1]);
$hash = password_hash('a', PASSWORD_DEFAULT);
// $user->update();
echo $hash;
echo "Fim";
