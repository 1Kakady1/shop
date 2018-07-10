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

    public static function edit($flag,$id, $name, $password,$usname, $email, $img)
    {
        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

switch ($flag){

case 0: $sql = "UPDATE $userTab SET name = :name WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();break;

case 1: $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);
        $new_password = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));
        $sql = "UPDATE $userTab SET password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $new_password , PDO::PARAM_STR);
        return $result->execute();break;

case 2: $sql = "UPDATE $userTab SET email = :email WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();break;

case 3: $sql = "UPDATE $userTab SET usimg = :usimg WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':usimg', $img, PDO::PARAM_STR);
        return $result->execute();break;

}

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

    public static function checkUserRestore($email, $usname)
    {
        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $sql = "SELECT * FROM $userTab WHERE email = :email AND usname= :usname";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':usname', $usname, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function newUserPasword($usname,$email){

        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $String="";
        $Char = '0123456789abcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < 11; $i ++) $String .= $Char[rand(0, strlen($Char) - 1)];

        $password = md5($setting['key1'].md5($setting['key2'].$String.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));

        $sql = "UPDATE $userTab SET password = :password WHERE usname = :usname";
        $result = $db->prepare($sql);
        $result->bindParam(':usname', $usname, PDO::PARAM_INT);
        $result->bindParam(':password', $password , PDO::PARAM_STR);
        $result->execute();

        mail($email, 'Востановление пароля', 'Новый пароль: '.$String." После входа не забудьте сменить его нановый.", 'From: '.$setting['MyEmail'].'');
        return true;



    }

    public static function auth($userId,$userEmail)
    {   //session_start();
        $_SESSION['user'] = $userId;
        //$_SESSION['email'] = $userEmail;
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

    public static function oldPassword($oldPasswordDB,$oldPassword,$usname) {

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $password_code = md5($setting['key1'].md5($setting['key2'].$oldPassword.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));

        if($password_code == $oldPasswordDB)
        {
            return true;
        }

        return false;

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

    public static function loadImage($email,$path)
    {

        //function LoadImg($path,$connection2,$users_tab_my)
            $types = array('image/gif', 'image/png', 'image/jpeg','image/jpg');
            $exp_tupe_array = array('gif','png','jpeg','jpg' );
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if (!in_array($_FILES['picture']['type'], $types))
                {return 5;} //msg error
                $typeImg= explode(".",$_FILES['picture']['name']);
               // var_dump($typeImg);
                for($i=0;$i<count($exp_tupe_array);$i++)
                {
                    if($typeImg[count($typeImg)-1] == $exp_tupe_array[$i])
                    {
                        $byfType=$exp_tupe_array[$i];
                        break;
                    }
                    $byfType = null;
                }

                if($byfType == null )
                {
                    return 6;
                }

                $name_file = md5($typeImg[0].$email).'.'.$byfType;
                $_FILES['picture']['name'] =$name_file;
                if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                    return 3;//msg bad type
                else
                    return $name_file;//msg ok!
            }

        }
        public static function sendActiveUsMail($id,$email)
        {
            $paramsPath = ROOT.'/config/config_site.php';
            $setting = include ($paramsPath);
            $String= null;
            $Char = '0123456789abcdefghijklmnopqrstuvwxyz';
            for ($i = 0; $i < 11; $i ++) {$String .= $Char[rand(0, strlen($Char) - 1)];}

            $userTab=Db::dbTableName('users');
            $db = Db::getConnection();

            $sql = "UPDATE $userTab SET code = :code WHERE email = :email";
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_INT);
            $result->bindParam(':code', $String, PDO::PARAM_STR);
            $result->execute();

            $Code= md5($setting['key1'].$String.md5($setting['key2'].$email.$setting['key3']))."j".$id;
            $Code=base64_encode($Code);
            mail($email, 'Регистрация на cайте', 'Ссылка для активации: '.ROOT.'/user/active/'.$Code, 'From: '.$setting['MyEmail'].'');
            return true;
        }

        public static function activeAcc()
        {

            if (!empty($_SERVER['REQUEST_URI'])) {

                $link_url = trim($_SERVER['REQUEST_URI'], '/');
                $buf = explode("/", $link_url);
            }
            $code =  base64_decode(htmlspecialchars($buf[count($buf)-1]));

            $buf_c = explode("j",$code );

            $xex = $buf_c[0];

            $id=intval($buf_c[1]);

            if(strlen($xex) == 32)
            {
                echo "<br><br>".$xex;
                $paramsPath = ROOT.'/config/config_site.php';
                $setting = include ($paramsPath);

                $userTab=Db::dbTableName('users');
                $db = Db::getConnection();

                $sql = "SELECT * FROM $userTab WHERE id = :id";

                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);

                // Указываем, что хотим получить данные в виде массива
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $result->execute();

                $String = array();
                $String = $result->fetch();

                $code_bd= md5($setting['key1'].$String['code'].md5($setting['key2'].$String['email'].$setting['key3']))."j".$id;
                $code = explode("j",$code_bd);

                if($xex == $code[0]) {


                    echo "<br><br>".$id;
                    $sql = "UPDATE $userTab SET active = 1 WHERE id = :id";
                    $result = $db->prepare($sql);
                    $result->bindParam(':id', $id, PDO::PARAM_INT);
                    // $result->bindParam(':active', 1, PDO::PARAM_STR);
                    $result->execute();
                    return true;

                }


            }

            return false;



        }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 8) {
            return true;
        }
        return false;
    }
}