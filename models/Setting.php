<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.07.2018
 * Time: 18:56
 */

class Setting
{

    public static function loadBanner($path,$fileName,$file)
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
            else
                return $name_file;//msg ok!
        }
    }

}