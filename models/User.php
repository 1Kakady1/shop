<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.06.2018
 * Time: 15:10
 */

class User
{
    public static function register($name, $usname, $email, $password) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();


        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $password = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));


        $sql = 'INSERT INTO '.$userTab.' (name, usname, email, password) VALUES (:name, :usname, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':usname', $usname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function edit($id, $name, $password)
    {
        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

        $sql = "UPDATE $userTab
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $sql = "SELECT usname FROM $userTab WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();

        $usname = $result->fetch();
        $password_code = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname['usname'].$setting['key5']));
        $sql = "SELECT * FROM $userTab WHERE email = :email AND password = :password";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password_code, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {   //session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        //session_start();
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM $userTab WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUnameExists($usname) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM $userTab WHERE usname = :usname";

        $result = $db->prepare($sql);
        $result->bindParam(':usname', $usname, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        if ($id) {

            $userTab=Db::dbTableName('users');
            $db = Db::getConnection();

            $sql = "SELECT * FROM $userTab WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }







}