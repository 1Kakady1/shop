<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 16:57
 */

/*
$paramsPath = './db_setting.php';
$params = include ($paramsPath);

$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
$tab_name='tr_setting';

$sql = "SELECT * FROM $tab_name";
$result = $db->query($sql);
//$result->setFetchMode(PDO::FETCH_ASSOC);
$st=array();

$i = 0;
while ($row = $result->fetch()) {
    $st[$i]['info'] = $row['info'];
    $i++;
}

var_dump($st);
*/
return $setting = array(
'prefix'=>'tr_', //
'news1'=> 0,'news2'=> 1,'news3'=> 2,
'price' =>"$",
'key1'=>"Tort",'key2'=>"228",'key3'=>"wEr0",'key4'=>"sdwcc1",'key5'=>"232cAA",
'MyEmail'=>"test@mail.ru",'msg'=>"http://http://bootsrapshop.loc/admin/orders",'subject'=>"Новый заказ!",
);
