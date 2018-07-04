<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.06.2018
 * Time: 14:33
 */
include_once ROOT.'/models/User.php';

class UserController
{
    public function actionRegister()
    {

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $name = '';
        $usname = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $usname = $_POST['usname'];
            $email = $_POST['email'];
            $password = $_POST['password'];



            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkName($usname)) {
                $errors[] = 'Ник не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if (User::checkUnameExists($usname)) {
                $errors[] = 'Такой ник уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $usname, $email, $password);

            }
        }

        require_once (ROOT.'/views/forms/register.php');
        return true;
    }


    public function actionLogin()
    {

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            ob_start();

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $id = User::checkUserData($email, $password);

            if ($id == false) {

                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($id,$email);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location:/cabinet/");
                ob_end_flush();
            }

        }

        require_once(ROOT . '/views/forms/login.php');

        return true;
    }

    public function actionLogout()
    {

        ob_start();
        unset($_SESSION["user"],$_SESSION["email"]);
        session_destroy();
        header("Location: /");
        ob_end_flush();
        exit();
    }

    public function actionActive()
    {


        $send =User::activeAcc();

        require_once(ROOT . '/views/forms/login.php');

        return true;
    }

}