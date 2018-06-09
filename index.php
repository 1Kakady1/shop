<?php

// setting
ini_set('display_errors',1);
error_reporting(E_ALL);

// подключение файлов
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');

// connect DB
require_once (ROOT.'/components/Db.php');
// Call Router

$router = new Router();
$router->run();