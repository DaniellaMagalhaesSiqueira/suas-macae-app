<?php
<<<<<<< HEAD
// ini_set("display_errors", 1);
session_start();
requiredValidSession();

$exception = null;

loadTemplateView('home', ['exception'=>$exception]);
=======
ini_set("display_errors", 0);
session_start();
requiredValidSession();
loadTemplateView('home');
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
