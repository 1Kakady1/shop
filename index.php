<?php

// setting
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// подключение файлов
define('ROOT', dirname(__FILE__));

require_once (ROOT.'/components/Autoload.php');
/*
 if( isset($_SESSION['user']) && $_COOKIE['user_cookie'])
 {
     $db = Db::getConnection();
     $userTab=Db::dbTableName('users');

     $paramsPath = ROOT.'/config/config_site.php';
     $setting = include ($paramsPath);
     $password=$_COOKIE['user_cookie'];
     $sql = "SELECT id,usname FROM $userTab WHERE password = :password";

     $result = $db->prepare($sql);
     $result->bindParam(':password', $password, PDO::PARAM_INT);
     $result->execute();

     $user = $result->fetch();
     var_dump($user['usname']);
     if ($user) {
         var_dump($user['id']);
         User::auth($user['id'],null);
     }
 }
*/
$router = new Router();
$router->run();