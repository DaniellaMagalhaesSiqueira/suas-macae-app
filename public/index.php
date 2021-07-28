<?php
ini_set('display_errors', 0);
require_once(dirname(__FILE__, 2). '\\src\\config\\config.php');

//evitando que se passe parâmetros através da url
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if($uri === '/' || $uri === '' || $uri === '/index.php'){
    $uri = '\\home.php';
}
require_once(CONTROLLER_PATH."\\{$uri}");
