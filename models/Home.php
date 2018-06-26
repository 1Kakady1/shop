<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 18.06.2018
 * Time: 20:14
 */

class Home
{
    //const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts(/*$count = self::SHOW_BY_DEFAULT*/)
    {
        //$count = intval($count);
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query("SELECT id, name, price, image, description, is_new FROM $productTab WHERE status = 1 ORDER BY id  ");

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

    public static function prodRandId($tableName)
    {

        $productTab=Db::dbTableName($tableName);
        $db = Db::getConnection();

        $query=$db->query("SELECT COUNT(*) as count FROM $productTab");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row=$query->fetch();
        $maxRand=$row['count'];

        $arrayRand = array();

        for($i=0;$i<3;$i++)
        {
            $arrayRand[$i] =  rand(1, $maxRand) -1;

            for($j=0;$j<count($arrayRand);$j++)
            {
                if($arrayRand[$i] == $arrayRand[$j] && $i!=$j)
                {
                    $arrayRand[$i] = rand(1, $maxRand) -1;
                }
            }
        }

        return $arrayRand;

    }
}