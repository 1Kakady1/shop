<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.06.2018
 * Time: 20:35
 */

class Comments
{

    public static function registerComments($id,$author,$name,$email,$msg) {

        $userTab=Db::dbTableName('comments');
        $db = Db::getConnection();

        if($author == NULL){$author = "Аноним";} else {$author ="Клиент";}

        $sql = "INSERT INTO $userTab (`author`, `nickname`, `email`, `text`,`articles_id`) VALUES (:author,:nickname ,:email , :text ,:articles_id)";

        $result = $db->prepare($sql);

        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':nickname', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $msg, PDO::PARAM_STR);
        $result->bindParam(':articles_id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function getCommentsList ($id)
    {
        $id = intval($id);

        if($id) {
            $listComTab = Db::dbTableName('comments');
            $db = Db::getConnection();


            $comList = array();

            $result = $db->query("SELECT * FROM  $listComTab  WHERE articles_id=$id ORDER BY pupdate DESC LIMIT 1");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;

            while ($row = $result->fetch()){

                $comList[$i]['author'] = $row['author'];
                $comList[$i]['nickname'] = $row['nickname'];
                $comList[$i]['email'] = $row['email'];
                $comList[$i]['text'] = $row['text'];
                $comList[$i]['pupdate'] = $row['pupdate'];
                $comList[$i]['usimg'] = $row['usimg'];

                $i++;
            }

            return  $comList;
        }

    }

    public static function getCommentsListOffset($id,$comOffset)
    {
        $id = intval($id);
        $comOffset = intval($comOffset);

        if($id) {
            $listComTab = Db::dbTableName('comments');
            $db = Db::getConnection();


            $comList = array();

            $result = $db->query("SELECT * FROM  $listComTab  WHERE articles_id=$id ORDER BY pupdate DESC LIMIT 2 OFFSET $comOffset");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;

            while ($row = $result->fetch()){

                $comList[$i]['author'] = $row['author'];
                $comList[$i]['nickname'] = $row['nickname'];
                $comList[$i]['email'] = $row['email'];
                $comList[$i]['text'] = $row['text'];
                $comList[$i]['pupdate'] = $row['pupdate'];
                $comList[$i]['usimg'] = $row['usimg'];

                $i++;
            }

            $comHeader = '<li class="wow slideInUp">
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">';
            $comFooter = '</div></div></li>';
            $z=0;
            $comRez = array();
            while(count($comList) > $z){

                $comImg =' <img src="https://ru.gravatar.com/avatar/'.md5('test@gg.mm').'?s=125" alt="c1"></div><div class="msg-com">';
                if($comList[$z]['usimg'] != NULL){
                    $comImg =  '<img src="/template/images/avatar/'.$comList[$z]['usimg'].'" alt="c1"></div><div class="msg-com">';
                }

                $c = '<h4>'.$comList[$z]['author'].': '.$comList[$z]['nickname'].'<span>/ '.$comList[$z]['pupdate'].'</span></h4>';
                $b = '<p>'.$comList[$z]['text'].'</p>';

                $comRez[$z] = $comHeader.$comImg.$c.$b.$comFooter;
                $z++;
            }

            //$comRez[count($comRez) - 1] = true;
            return  $comRez;
        }

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
    public static function checkMSG($msg) {

        $flag_count = false;
        $flag_lib = false;

        if (strlen($msg) < 5) {
            $flag_count = true;
        }

        $flag_lib=Comments::delErrorNameMSG($msg);

        if($flag_count == true || $flag_lib == true)
        {
               return false;
        }

        return true;


    }

    public static function  delErrorNameMSG($msg)
    {
        $line = file_get_contents( ROOT.'/config/LibContentList.txt');
        $content = array();
        $content= explode(';' , $line);

        $content_msg = array();
        $content_msg= explode(' ' , $msg);

        $arraySym= array("!",",","<",">","#","@","&","(",")"); // сделать чтение из файла;

        for($i=0; $i<count($arraySym); $i++)
        {
            for($j=0; $j<count($content_msg); $j++)
            {
                str_replace($arraySym[$i], '', $content_msg[$j]);
            }

        }


        for($i=0; $i<count($content); $i++)
        {
            for($j=0; $j<count($content_msg); $j++)
            {
                if(strtoupper($content_msg[$j]) == strtoupper($content[$i]) )
                {
                    return true; break;
                }


            }

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
}