<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\assets\css\comum.css">
    <link rel="stylesheet" href="\assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="\assets\css\icofont.min.css">
    <link rel="stylesheet" href="\assets\css\login.css">
    <title>Sistema CRAS</title>
</head>
<body>
<form class="form-login" action="#" method="post">
    <div class="login-card card">
        <div class="card-header">
            <span class="font-weight-light mr-2">Sistema de Gerenciamento de CRAS</span>
            <i class="icofont-home ml-3"></i>
            <!-- <i class="icofont-database"></i> -->
        </div>
        <div class="card-body">
            <?php include(TEMPLATE_PATH."\\messages.php");?>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email_funcionario" id="email"
                    class="form-control <?= $errors['email_funcionario'] ? 'is-invalid' : '' ?>" 
                    value="<?= $email_funcionario ?>"
                    placeholder="Informe o e-mail" autofocus>
                <div class="invalid-feedback ">
                    <?= $errors['email_funcionario']?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="senha_funcionario" id="password"
                class="form-control <?= $errors['senha_funcionario'] ? 'is-invalid' : '' ?>" 
                placeholder="Informe a senha" autofocus>
                <div class="invalid-feedback ">
                    <?= $errors['senha_funcionario']?>
                </div>
            </div>
<<<<<<< HEAD
            <!-- <div>
                <a href="#" class="">Esqueci minha senha</a>
            </div> -->
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        </div>
        <div class="card-footer">
            <button class="btn btn-lg btn-primary">Entrar</button>
        </div>
    </div>
</form>
</body>
</html>