<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.07.2018
 * Time: 18:56
 */

class Setting
{

    public static function loadBanner($path,$fileName,$file,$id_bn)
    {
        $types = array('image/gif', 'image/png', 'image/jpeg','image/jpg');
        $exp_tupe_array = array('gif','png','jpeg','jpg' );
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!in_array($_FILES[$file]['type'], $types))
            {return 5;} //msg error
            $typeImg= explode(".",$_FILES[$file]['name']);
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
            $name_file = $fileName.'.'.$byfType;
            $_FILES[$file]['name'] =$name_file;
            if (!@copy($_FILES[$file]['tmp_name'], $path . $_FILES[$file]['name']))
                return 3;//msg bad type
            else{
                $settingTab=Db::dbTableName('setting');
                $db = Db::getConnection();

                $sql = "UPDATE $settingTab SET info = :name  WHERE id = :id1";
                $result = $db->prepare($sql);
                $result->bindParam(':id1', $id_bn, PDO::PARAM_INT);
                $result->bindParam(':name', $name_file, PDO::PARAM_STR);
                $fl1=$result->execute();

                return $name_file;//msg ok!
              }

        }
    }

    public static function updateSetting($email,$phone,$adr,$workTime)
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $listSetting = array();
        $listSetting = self::getSetting();

        $id1 = $listSetting[3]['id'] ;
        $id2 = $listSetting[4]['id'] ;
        $id3 = $listSetting[5]['id'] ;
        $id4 = $listSetting[6]['id'] ;


        $sql = "UPDATE $settingTab SET info = :email  WHERE id = :id1";
        $result = $db->prepare($sql);
        $result->bindParam(':id1', $id1, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $fl1=$result->execute();

        $sql = "UPDATE $settingTab SET info = :phone  WHERE id = :id2";
        $result = $db->prepare($sql);
        $result->bindParam(':id2', $id2, PDO::PARAM_INT);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $fl2=$result->execute();


        $sql = "UPDATE $settingTab SET info = :adr  WHERE id = :id3";
        $result = $db->prepare($sql);
        $result->bindParam(':id3', $id3, PDO::PARAM_INT);
        $result->bindParam(':adr', $adr, PDO::PARAM_STR);
        $fl3= $result->execute();

        $sql = "UPDATE $settingTab SET info = :workTime  WHERE id = :id4";
        $result = $db->prepare($sql);
        $result->bindParam(':id4', $id4, PDO::PARAM_INT);
        $result->bindParam(':workTime', $workTime, PDO::PARAM_STR);
        $fl4= $result->execute();

        if($fl3!=false && $fl2!=false && $fl1!=false && $fl4!=false)
        {
            return "Данные изменены";
        } else {return false; }



    }

    public static function getSetting()
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $sql = "SELECT * FROM $settingTab";
        $result = $db->query($sql);
        $st=array();


        $i = 0;
        while ($row = $result->fetch()) {
            $st[$i]['id'] = $row['id'];
            $st[$i]['info'] = $row['info'];
            $i++;
        }
        return $st;

    }

    public static function updateNewsDb($op1,$op2,$op3)
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $listSetting = array();
        $listSetting = self::getSetting();

        $id1 = $listSetting[8]['id'] ;
        $id2 = $listSetting[9]['id'] ;
        $id3 = $listSetting[10]['id'] ;


        $sql = "UPDATE $settingTab SET info = :news1  WHERE id = :id1";
        $result = $db->prepare($sql);
        $result->bindParam(':id1', $id1, PDO::PARAM_INT);
        $result->bindParam(':news1', $op1, PDO::PARAM_STR);
        $fl1=$result->execute();

        $sql = "UPDATE $settingTab SET info = :news2  WHERE id = :id2";
        $result = $db->prepare($sql);
        $result->bindParam(':id2', $id2, PDO::PARAM_INT);
        $result->bindParam(':news2', $op2, PDO::PARAM_STR);
        $fl2=$result->execute();


        $sql = "UPDATE $settingTab SET info = :news3  WHERE id = :id3";
        $result = $db->prepare($sql);
        $result->bindParam(':id3', $id3, PDO::PARAM_INT);
        $result->bindParam(':news3', $op3, PDO::PARAM_STR);
        $fl3=$result->execute();

        if($fl3!=false && $fl2!=false && $fl1!=false )
        {
            return "Данные изменены";
        } else {return false; }

    }
}