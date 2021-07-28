<?php
ini_set('display_errors', 0);
session_start();
loadModel('Unidade');
$unidade = Unidade::getOne(['id_unidade'=>$_GET['update']]);
$unidade->ativo_unidade = 0;
$unidade->update();
addWarningMsg('Unidade desligada.');
header('Location: home.php');
exit();

loadTemplateView('desativar_unidade.php');