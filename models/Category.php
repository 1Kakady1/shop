<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.06.2018
 * Time: 16:16
 */

class Category
{

    public static function getCategoriesList()
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();

        $catList = array();

        $result = $db->query("SELECT id, name FROM $catTab ORDER BY sort_order ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $catList[$i]['id'] = $row['id'];
            $catList[$i]['name'] = $row['name'];
            $i++;
        }

        return  $catList;
    }
}