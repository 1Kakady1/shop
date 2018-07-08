<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 17.06.2018
 * Time: 20:36
 */

class Product
{
    const SHOW_BY_DEFAULT = 6;


    public static function getLatestProducts($page=1)
    {
       // $count = intval($count);
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $productsList = array();

        $page = intval($page);
        $offset = ($page -1)* self::SHOW_BY_DEFAULT;

        //$result = $db->query("SELECT id, name, price, image, description, is_new FROM $productTab WHERE status = 1 ORDER BY id DESC LIMIT " . $count);

        $result = $db->query("SELECT id, name, price, image, description, is_new FROM ".$productTab
            ." WHERE status = 1 "
            ."ORDER BY id DESC "
            ."LIMIT " .self::SHOW_BY_DEFAULT
            .' OFFSET ' .$offset);

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

    public static function getProductsCategoriesId($id = false,$page=1)
    {
        $id = intval($id);

        if ($id) {

            $page = intval($page);
            $offset = ($page -1)* self::SHOW_BY_DEFAULT;

          //  $count = intval($count);
            $productTab=Db::dbTableName('product');
            $db = Db::getConnection();
            $productsCatList = array();

            $result = $db->query("SELECT id, name, price, image, description, is_new FROM ".$productTab
            ." WHERE status = 1 AND category_id ='$id' "
            ."ORDER BY id DESC "
            ."LIMIT " .self::SHOW_BY_DEFAULT
            .' OFFSET ' . $offset);

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

    public static function getTotalProducts()
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM '.$productTab
            . ' WHERE status="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getTotalProductsInCategory($id)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM '.$productTab
            . ' WHERE status="1" AND category_id ="'.$id.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProdustsByIds($idsArray)
    {
        $products = array();
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM $productTab WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }

        return $products;
    }
}