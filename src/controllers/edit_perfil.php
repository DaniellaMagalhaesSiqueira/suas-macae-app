<?php
ini_set('display_errors', 1);
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
        $user->senha_funcionario = password_hash($_POST['senha_funcionario'], PASSWORD_DEFAULT);
        $user->confirmacao_senha = $_POST['confirmacao_senha'];
        $user->update();
        addSuccessMsg('Senha alterada com sucesso');

    }catch(Exception $e){
        $exception = $e;
    }
}

loadTemplateView('edit_perfil', ['user' => $user] + 
    ['exception' => $exception]);

