<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';
class ProductController
{
    public $product;

    public function actionIndex($page=1)
    {

        $cat = array();
        $cat = Category::getCategoriesList();

        $catId = 0;

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts($page);

        $total= Product::getTotalProducts($page);
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

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

    public function actionCat($id,$page=1)
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
        $listProdCat = Product::getProductsCategoriesId($id,$page);

        $total= Product::getTotalProductsInCategory($id,$page);
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

        require_once(ROOT . '/views/product/category_id.php');
        return true;
    }
}