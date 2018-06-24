<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
class ProductController
{
    public $product;

    public function actionIndex()
    {
        $cat = array();
        $cat = Category::getCategoriesList();

        $catId = 0;

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    public function actionView($id)
    {
        $productItem= array();
        $productItem = Product::getProductItemById($id);

        $productGallery = array();
        $productGallery = Product::getProductGalleryItemById($id);

        require_once(ROOT . '/views/product/article_product.php');
        return true;
    }

    public function actionCat($id)
    {
        $cat = array();
        $cat = Category::getCategoriesList();

        for ($i=0;$i<count($cat);$i++)
        {
            if($cat[$i]['id'] == $id ){
                $catName = $cat[$i]['name'];
                $catId = $cat[$i]['id'];
                break;
            }
        }


        $listProdCat = array();
        $listProdCat = Product::getProductsCategoriesId($id,6);

        require_once(ROOT . '/views/product/category_id.php');
        return true;
    }
}