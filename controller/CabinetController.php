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

        $upp=0;

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password_oldDB = $user['password'];
        $usname = $user['usname'];

        $result = false;

        if (isset($_POST['submit-name'])) {
            $name = $_POST['name'];
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if ($errors == false) {
                $result = User::edit(0,$userId, $name, null,null,null,null);
            }

        }
//////////////////////////////////////////////////////////////////
        if (isset($_POST['submit-password'])) {

            $password = $_POST['password'];
            $password_old = $_POST['password-old'];

            $errors = false;

            if (!User::oldPassword($password_oldDB,$password_old,$usname)) {
                $errors[] = 'Неверно введен старый пароль';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Длина пароля должна быть  > 6';
            }

            if ($errors == false) {
                $result = User::edit(1,$userId,null,$password,$usname,null,null);
            }

        }
////////////////////////////////////////////////////////////////////
        if (isset($_POST['submit-email'])) {
            $email = $_POST['email'];
            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = User::edit(2,$userId, null, null,null,$email,null);
            }

        }
///////////////////////////////////////////////////////////////////////
        if (isset($_POST['submit-avatar'])) {
            $errors = false;

           $resultImg =  User::loadImage($user['email'],ROOT.'/template/images/avatar/');

           if($resultImg==6 || $resultImg==5 || $resultImg==3 ){
               $errors[] = 'Не удалось загрузить изображение';
           } else {
               $result = User::edit(3,$userId, null, null,null,null,$resultImg );
               $upp =1;
           }

        }

        if($upp==1){$upp=0;header("Refresh:0");}
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

}