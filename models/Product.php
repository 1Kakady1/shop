<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 17.06.2018
 * Time: 20:36
 */

class Product
{
    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query("SELECT id, name, price, image, description, is_new FROM $productTab WHERE status = 1 ORDER BY id DESC LIMIT " . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }
}