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

    public static function getProductsCategoriesId($id,$count = self::SHOW_BY_DEFAULT)
    {
        $id = intval($id);

        if ($id) {

            $count = intval($count);
            $productTab=Db::dbTableName('product');
            $db = Db::getConnection();
            $productsCatList = array();

            $result = $db->query("SELECT id, name, price, image, description, is_new FROM $productTab WHERE status = 1 AND category_id = $id ORDER BY id DESC LIMIT " . $count);

            $i = 0;
            while ($row = $result->fetch()) {
                $productsCatList[$i]['id'] = $row['id'];
                $productsCatList[$i]['name'] = $row['name'];
                $productsCatList[$i]['image'] = $row['image'];
                $productsCatList[$i]['description'] = $row['description'];
                $productsCatList[$i]['price'] = $row['price'];
                $productsCatList[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $productsCatList;
            }
        }

    public  static  function getProductGalleryItemById($id)
    {

        $id = intval($id);

        if($id) {
            $newsTab=Db::dbTableName('product');
            $db= Db::getConnection();

            $result = $db->query("SELECT gallery FROM $newsTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $BufGallery = $result->fetch();

            $productGallery = explode(";",$BufGallery['gallery']);

            return $productGallery;
        }
    }

    public  static  function getProductItemById($id)
    {

        $id = intval($id);

        if($id) {
            $productTab=Db::dbTableName('product');
            $db= Db::getConnection();

            $result = $db->query("SELECT * FROM $productTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $productItem = $result->fetch();

            return $productItem;
        }
    }
}