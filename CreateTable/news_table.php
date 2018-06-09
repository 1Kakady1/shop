<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 16:13
 */

include_once ROOT.'/config/config_site.php';

$host = 'localhost';
$dbname = 'BS_shop';
$user = 'root';
$password ='';

$my_news_tb = $tb_prefix."_news";

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
} catch (PDOException $e) {
    echo $e->getMessage();
}