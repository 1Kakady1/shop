<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.07.2018
 * Time: 14:58
 */

class Search
{
        const SHOW_BY_DEFAULT = 12;

        public static function getSearch($search,$page=1)
        {
            $search =nl2br(htmlspecialchars(trim($search), ENT_QUOTES), false);

            $prodTab=Db::dbTableName('product');
            $db = Db::getConnection();

           // $page = intval($page);
          //  $offset = ($page -1)* self::SHOW_BY_DEFAULT;

            $value = "$search%";
            $sql = "SELECT * FROM $prodTab WHERE name  LIKE ? OR description LIKE ? OR code LIKE ? ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT;
            $result = $db->prepare($sql);
            $result->execute(array($value,$value,$value));
            $st=array();

            $i = 0;
            while ($row = $result->fetch()) {
                $st[$i]['id'] = $row['id'];
                $st[$i]['name'] = $row['name'];
                $st[$i]['image'] = $row['image'];
                $st[$i]['is_new'] = $row['is_new'];
                $st[$i]['price'] = $row['price'];
                $st[$i]['code'] = $row['code'];
                $st[$i]['description'] = $row['description'];
                $i++;
            }
            return $st;
        }
}