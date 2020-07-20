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
    const SHOW_BY_DEFAULT_ADMIN = 13;


    public static function getLatestProducts($page=1)
    {

        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $productsList = array();

        $page = intval($page);
        $offset = ($page -1)* self::SHOW_BY_DEFAULT;

        $result = $db->query("SELECT id, name, price, image, code, description, is_new FROM ".$productTab
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

	public static function getLatestProductsApi($offset=0,$limit=12)
	{

		$productTab=Db::dbTableName('product');
		$db = Db::getConnection();
		$productsList = array();

//		$page = intval($page);
//		$offset = ($page -1)* self::SHOW_BY_DEFAULT;

		$result = $db->query("SELECT * FROM ".$productTab
			." WHERE status = 1 "
			."ORDER BY id DESC "
			."LIMIT " .$limit
			.' OFFSET ' .$offset);

		$i = 0;
		while ($row = $result->fetch()) {
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['image'] = $row['image'];
			$productsList[$i]['description'] = $row['description'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['brand'] = $row['brand'];
			$productsList[$i]['code'] = $row['code'];
			$productsList[$i]['category_id'] = $row['category_id'];
			$productsList[$i]['is_new'] = $row['is_new'];
			$productsList[$i]['is_recommended'] = $row['is_recommended'];
			$productsList[$i]['info'] = $row['info'];
			$productsList[$i]['gallery'] = $row['gallery'];
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

            $result = $db->query("SELECT id, name, price, image, code, description, is_new FROM ".$productTab
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
                $productsCatList[$i]['code'] = $row['code'];
                $productsCatList[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $productsCatList;
            }
        }
    private static function codifCatName($catList,$catId){

        for($i=0;$i<count($catList);$i++){
            if($catList[$i]['id'] == $catId){
                return $catList[$i]['name'];
            }
        }

        return null;

    }
    public static function getRecommendedProducts($catList)
    {
            $productTab=Db::dbTableName('product');
            $db = Db::getConnection();
            $productsRem = array();

            $result = $db->query("SELECT id, name, price, image, category_id FROM ".$productTab
                ." WHERE is_recommended = 1 "
                ."ORDER BY id DESC ");

            $i = 0;
            while ($row = $result->fetch()) {
                $productsRem[$i]['id'] = $row['id'];
                $productsRem[$i]['name'] = $row['name'];
                $productsRem[$i]['image'] = $row['image'];
                $productsRem[$i]['price'] = $row['price'];
                $productsRem[$i]['cat'] = self::codifCatName($catList,$row['category_id']); //$row['category_id'];
                $i++;
            }

            return $productsRem;

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
            array_pop($productGallery);

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

    public static function getTableProd($array)
    {

        $productsQuantity = json_decode($array['product'], true);

        $productsIds = array_keys($productsQuantity);
        $products = Product::getProdustsByIds($productsIds);
        return $products;
    }

    public static function getProductsList($page)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $productsList = array();

        $page = intval($page);
        $offset = ($page -1)* self::SHOW_BY_DEFAULT;

        $result = $db->query("SELECT id, name, price, image, 
					code, description, is_new FROM ".$productTab
            ." WHERE status = 1 "
            ."ORDER BY id DESC "
            ."LIMIT " .self::SHOW_BY_DEFAULT_ADMIN
            .' OFFSET ' .$offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function deleteProductById($id)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $sql = "DELETE FROM $productTab WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $gallery="";$i=1;

        while($i<count($options['gal']))
        {
            if($options['gal'][$i] != false)
            {
                $gallery.=$options['gal'][$i].";";
            }

            $i++;
        }

        $sql = 'INSERT INTO  '.$productTab
            . ' (name, category_id,code, price,availability ,brand, image,'
            . 'description, is_new, is_recommended, status,gallery, info)'
            . 'VALUES '
            . '(:name, :category_id,:code, :price,:availability, :brand, :image, '
            . ':description, :is_new, :is_recommended, :status, :gallery, :info)';

        // Получение и возврат результатов. Используется подготовленный запрос
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':gallery', $gallery, PDO::PARAM_STR);
        $result->bindParam(':info', $options['info'], PDO::PARAM_STR);
       // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function loadImageProd($email,$path,$key)
    {
        //function LoadImg($path,$connection2,$users_tab_my)
        require_once("vendor/autoload.php");
        $TinyON = Setting::getSetting();

        if($TinyON[14]['info'] == "on"){
            try {
                \Tinify\setKey($TinyON[15]['info']);
                \Tinify\validate();
            } catch(\Tinify\Exception $e) {
                print("The error message is: " . $e->getMessage());
                return false;
                exit;
            }
        }



        $types = array('image/gif', 'image/png', 'image/jpeg','image/jpg');
        $exp_tupe_array = array('gif','png','jpeg','jpg' );

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!in_array($_FILES[$key]['type'], $types))
            {return false;} //msg error
            $typeImg= explode(".",$_FILES[$key]['name']);
            // var_dump($typeImg);
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
                return false;
            }

            $name_file = md5($typeImg[0].$email).'.'.$byfType;

            $source = \Tinify\fromFile($_FILES[$key]['tmp_name']);
            $source->toFile( $path.$name_file);
            if($TinyON[14]['info'] == "on") {
                try {
                    return $name_file;
                } catch (\Tinify\AccountException $e) {
                    print("The error message is: " . $e->getMessage());
                    return false;
                    exit;
                } catch (\Tinify\ClientException $e) {
                    print("The error message is: " . $e->getMessage());
                    return false;
                    exit;
                } catch (\Tinify\ServerException $e) {
                    print("The error message is: " . $e->getMessage());
                    return false;
                    exit;
                } catch (\Tinify\ConnectionException $e) {
                    return false;
                } catch (Exception $e) {
                    print("The error message is: " . $e->getMessage());
                    return false;
                    exit;
                }
            } else {
                $_FILES[$key]['name'] =$name_file;
                 if (!@copy($_FILES[$key]['tmp_name'], $path . $_FILES[$key]['name']))
                   return false;//msg bad type
                  else
                     return $name_file;//msg ok!
            }

        }
    }

    public static function checkArticle($article)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();
        $sql = "SELECT code FROM $productTab WHERE code  LIKE ?";
        $result = $db->prepare($sql);
        $result->execute(array($article));
        return $result->fetch();
    }

    public static function updateProductById($id, $options)
    {
        $productTab=Db::dbTableName('product');
        $db = Db::getConnection();

        $gallery="";$i=1;

        while($i<count($options['gal']))
        {
            if($options['gal'][$i] != false)
            {
                $gallery.=$options['gal'][$i].";";
            }

            $i++;
        }

        $sql = "UPDATE $productTab
            SET 
                name = :name, 
                category_id = :category_id,
                code = :code, 
                price = :price, 
                availability = :availability, 
                brand = :brand, 
                image=:image,
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status,
                gallery=:gallery,
                info=:info
            WHERE id = :id";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':info', $options['info'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':image', $options['image'], PDO::PARAM_INT);
        $result->bindParam(':gallery', $gallery, PDO::PARAM_INT);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $result->execute();
    }
}