<?php
// ini_set("display_errors", 1);
session_start();
requiredValidSession();

$exception = null;

loadTemplateView('home', ['exception'=>$exception]);
