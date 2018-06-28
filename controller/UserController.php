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
                var_dump($result);

            }
        }

        require_once (ROOT.'/views/forms/register.php');
        return true;
    }

}