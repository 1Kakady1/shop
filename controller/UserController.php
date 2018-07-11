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
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

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
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        ob_start();
        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;


            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $id = User::checkUserData($email, $password);

            if ($id == false) {

                $errors[] = 'Неверные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
               /* if (isset($_POST['remember'])) {
                    setcookie('user_cookie',$password,strtotime('+15 day'),'/');
                } */
                User::auth($id,$email);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location:/cabinet/");
                ob_end_flush();
            }

        }

        require_once(ROOT . '/views/forms/login.php');

        return true;
    }

    public function actionRestore()
    {
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        if(isset($_COOKIE['grdcvr']))
        {
            $_SESSION["login-restore"] = 1;
            header("Location:/user/login/");
            exit;
        }

        ob_start();

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $email = '';
        $usname = '';

        if (isset($_POST['submit'])) {

                $email = $_POST['email'];
                $usname = $_POST['usname'];

                $errors = false;


                if (!User::checkEmail($email)) {
                    $errors[] = 'Проверьте на верность введеные данные';
                }

                if (!User::checkName($usname)) {
                    $errors[] = 'Проверьте на верность введеные данные';
                }

                // Проверяем существует ли пользователь
                $id = User::checkUserRestore($email, $usname);

                if ($id == false) {

                    $errors[] = 'Неверные данные для входа на сайт';
                } else {

                    User::newUserPasword($usname, $email);
                    setcookie('grdcvr', 1, strtotime(time() + 3600), '/');
                    $_SESSION["restore"] = 1;
                    header("Location:/user/login/");
                    ob_end_flush();
                }
        }

        require_once(ROOT . '/views/forms/restore.php');

        return true;

    }

    public function actionLogout()
    {

        ob_start();
        unset($_SESSION["user"],$_SESSION["email"]);
        session_destroy();
        header("Location: /");
        ob_end_flush();

    }

    public function actionActive()
    {


        $send =User::activeAcc();

        require_once(ROOT . '/views/forms/login.php');

        return true;
    }

}