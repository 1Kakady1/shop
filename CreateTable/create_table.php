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
$my_prod_tb = $setting['prefix']."product";
$my_users_tb = $setting['prefix']."users";
$my_comments_tb = $setting['prefix']."comments";
$my_order_tb = $setting['prefix']."order";

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

// table product
try {
    $queryStr = "CREATE TABLE $my_prod_tb ( id INT(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY, 
                                            name VARCHAR(255) NOT NULL , 
                                            category_id INT(11) NOT NULL , 
                                            code INT(11) NOT NULL , 
                                            price FLOAT NOT NULL , 
                                            availability INT(11) NOT NULL , 
                                            brand VARCHAR(255) NOT NULL , 
                                            image VARCHAR(255) NOT NULL , 
                                            description TEXT NOT NULL , 
                                            is_new INT(11) NOT NULL DEFAULT '0' , 
                                            is_recommended INT(11) NOT NULL DEFAULT '0' , 
                                            status INT(11) NOT NULL DEFAULT '1' , 
                                            gallery VARCHAR(255) NULL DEFAULT NULL,
                                            info TEXT NULL DEFAULT NULL)";
    $db->query($queryStr);
    echo 'Таблица product создана <br><br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}

// table users
try {
    $queryStr = "CREATE TABLE $my_users_tb ( id INT(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY , 
                                             name VARCHAR(100) NOT NULL , 
                                             usname VARCHAR(100) NOT NULL , 
                                             password VARCHAR(255) NOT NULL , 
                                             email VARCHAR(100) NOT NULL,
                                             usimg VARCHAR(100) NOT NULL,
                                             active INT(2) NOT NULL DEFAULT '0',
                                             code VARCHAR(50) NULL DEFAULT NULL,
                                             role VARCHAR(100) NOT NULL)";
    $db->query($queryStr);
    echo 'Таблица users создана <br><br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}
// table comments
try {
    $queryStr = "CREATE TABLE $my_comments_tb (id INT(15) NOT NULL AUTO_INCREMENT  PRIMARY KEY , 
                                            author VARCHAR(100) NULL DEFAULT 'Аноним' , 
                                            nickname VARCHAR(100) NOT NULL , 
                                            email VARCHAR(100) NOT NULL , 
                                            text TEXT NOT NULL , 
                                            pupdate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                                            usimg VARCHAR(100) NOT NULL,
                                            articles_id INT NOT NULL )";
    $db->query($queryStr);
    echo 'Таблица comments создана <br><br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}

// table order
try {
    $queryStr = "CREATE TABLE $my_order_tb ( id INT(15) NOT NULL AUTO_INCREMENT  PRIMARY KEY , 
                                                name VARCHAR(150) NULL DEFAULT NULL , 
                                                phone VARCHAR(50) NULL DEFAULT NULL , 
                                                comments TEXT NULL DEFAULT NULL,
                                                email VARCHAR(150) NOT NULL , 
                                                us_id INT(11) NOT NULL , 
                                                product TEXT NOT NULL,
                                                date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
                                                status INT(11) NOT NULL DEFAULT '1' )";
    $db->query($queryStr);
    echo 'Таблица order создана <br><br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}