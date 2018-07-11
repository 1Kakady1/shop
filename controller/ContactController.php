<?php
class ContactController
{

    public function actionIndex()
    {

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $name = '';
        $email = '';
        $msg= '';
        $subject ='';
        $result = false;

        $infoPr = 0;
        $notSession =0;

        if(isset($_SESSION['user']))
        {

            $userId = $_SESSION['user'];
            $user= User::getUserById($userId);

            $name=$user['name'];
            $email=$user['email'];

            $notSession =1;

        }


        if (isset($_POST['submit'])) {


            if( $notSession == 0 )
             {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $infoPr = 1;
             }


            $subject = $_POST['subject'];
           // var_dump($_POST['msg']);
            $msg = $_POST['msg'];
            $errors = false;

            if($infoPr == 1){

                if (!Comments::checkName($name)) {
                    $errors[] = 'Имя не должно быть короче 2-х символов';
                }

                if (Comments::delErrorNameMSG($name) ==  true) {
                    $errors[] = 'Имя содержит недопустимые символы';
                }

                if (!Comments::checkEmail($email)) {
                    $errors[] = 'Неправильный email';
                }
            }

            if (!Comments::checkMSG($msg)) {
                $errors[] = 'Возможно сообщение короче 5-ти символов или содержит оскорбления и т.п.';
            }

            if (!Comments::checkMSG( $subject)) {
                $errors[] = 'Возможно тема короче 5-ти символов или содержит оскорбления и т.п.';
            }


            if ($errors == false) {

                $paramsPath = ROOT.'/config/config_site.php';
                $setting = include ($paramsPath);

                $to      = $setting['MyEmail'];
                $subjectMail = $subject;
                $message = $msg;
                $headers = 'From: '.$email.'' . "\r\n" .
                    'Reply-To: '.$email.'' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subjectMail, $message, $headers);

                $result="Все ок!!!";
                $name = '';
                $email = '';
                $msg= '';
                $subject ='';
            }

        }

        $address= Functions::getAddress();

        $phone_array = explode("&", $address[1]['info']);


        require_once(ROOT . '/views/contact/index.php');
        return true;
    }

}