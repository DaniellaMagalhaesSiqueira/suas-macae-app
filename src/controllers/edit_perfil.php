<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();
$exception = null;
$user = $_SESSION['user'];

if(count($_POST)> 0){
    try{
        $user = Funcionario::getOne(['id_funcionario' => $user->id_funcionario]);
        if(isset($_POST['email_funcionario'])){
            $user->email_funcionario = $_POST['email_funcionario'];
        }
        $user->senha_funcionario = $_POST['senha_funcionario'];
        $user->confirmacao_senha = $_POST['confirmacao_senha'];
        $user->update(true);
        addSuccessMsg('Senha alterada com sucesso');
        header('Location: logout.php');
        exit();

    }catch(Exception $e){
        $exception = $e;
    }
}

loadTemplateView('edit_perfil', $_POST + ['user' => $user, 'exception' => $exception]);

