<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 16:13
 */

 include_once '../config/config_site.php';

$host = 'localhost';
$dbname = 'BS_shop';
$user = 'root';
$password ='';

$my_news_tb = $setting['prefix']."news";
$my_cat_tb = $setting['prefix']."category";

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// table news
try {
    $queryStr = "CREATE TABLE $my_news_tb ( id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY , 
                                        title VARCHAR(255),
                                        date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                                        short_content TEXT, 
                                        content TEXT, 
                                        autor_name VARCHAR(150), 
                                        preview VARCHAR(255), 
                                        tupe VARCHAR(50), 
                                        gallery VARCHAR(255))";
    $db->query($queryStr);
    echo "Таблица news создана <br><br";
} catch (PDOException $e) {
    echo $e->getMessage();
}

// table category
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $queryStr = "CREATE TABLE $my_cat_tb ( id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                                        name VARCHAR(255) NOT NULL , 
                                        sort_order INT(11) NOT NULL DEFAULT '0' , 
                                        staus INT(11) NOT NULL DEFAULT '1')";
    $db->query($queryStr);
    echo 'Таблица category создана <br><br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}