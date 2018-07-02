<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 02.07.2018
 * Time: 15:36
 */

class CabinetController
{

    public function actionIndex()
    {
        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $userId = User::checkLogged();

        require_once (ROOT.'/views/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {
        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }

        }

        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }

}