<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */
include_once ROOT.'/models/Category.php';

class ProductController
{
    public $product;

    public function actionIndex()
    {
        $cat = array();
        $cat = Category::getCategoriesList();
       // $this -> product = "product";
        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    public function actionView($id)
    {
        require_once(ROOT . '/views/product/article_product.php');
        return true;
    }
}