<!DOCTYPE html>
<<<<<<< HEAD
    <html lang="pt-br">
    <head>
 
    <meta charset="utf-8">
=======
<html lang="en">
    <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="\assets\js\jquery.min.js"></script>
    <script src="\assets\js\jquery.mask.min.js"></script>
<<<<<<< HEAD
    <script src="\assets\js\bootstrap.min.js" ></script>
=======
    <script src="\assets\js\bootstrap.min.js"></script>
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
    <link rel="stylesheet" href="\assets\css\inter.css">
    <link rel="stylesheet" href="\assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="\assets\css\icofont.min.css">
    <link rel="stylesheet" href="\assets\css\template.css">


    <title>Sistema CRAS</title>
</head>
<body class="">
    <header class="header">
        <div class="menu-toggle mx-3">
            <!-- <i class="icofont-navigation-menu text-dark"></i> -->
        </div>
        <div class="logo">
           
        </div>
        <a href="home.php"><span class="title-home font-weight-light mr-2 ml-3">Sistema de Gerenciamento de CRAS</span></a>
        <span class="text-light font-weight-light"><?= $_SESSION['unidade']->nome_unidade ?></span>
        <div class="spacer"></div>
        <!-- <i class="icofont-database"></i> -->          
        <div class="dropdown">
            <i class="icofont-user text-light"></i>
                <span class="ml-3 text-light">
                    <?= $_SESSION['name_user'] ?>
                </span>
                <i class="icofont-simple-down text-white mx-2"></i>
                <div class="dropdown-button">
                    <div class="dropdown-content">
                        <ul class="nav-list">
                            <li class="nav-item">
                                <a href="logout.php">
                                    <i class="icofont-logout mr-2"></i>
                                    Sair
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="edit_perfil.php">
                                    <i class="icofont-edit mr-2"></i>
                                    Editar Perfil
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>