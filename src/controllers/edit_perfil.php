<?php
<<<<<<< HEAD
ini_set('display_errors', 0);
=======
ini_set('display_errors', 1);
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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
<<<<<<< HEAD
        $user->senha_funcionario = $_POST['senha_funcionario'];
        $user->confirmacao_senha = $_POST['confirmacao_senha'];
        $user->update(true);
        addSuccessMsg('Senha alterada com sucesso');
        header('Location: logout.php');
        exit();
=======
        $user->senha_funcionario = password_hash($_POST['senha_funcionario'], PASSWORD_DEFAULT);
        $user->confirmacao_senha = $_POST['confirmacao_senha'];
        $user->update();
        addSuccessMsg('Senha alterada com sucesso');
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f

    }catch(Exception $e){
        $exception = $e;
    }
}

<<<<<<< HEAD
loadTemplateView('edit_perfil', $_POST + ['user' => $user, 'exception' => $exception]);
=======
loadTemplateView('edit_perfil', ['user' => $user] + 
    ['exception' => $exception]);
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f

