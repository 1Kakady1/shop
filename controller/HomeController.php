<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 23:15
 */
include_once ROOT.'/models/News.php';
include_once ROOT.'/models/Functions.php';
include_once ROOT.'/models/Product.php';

class HomeController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        require_once(ROOT . '/views/home/index.php');
        return true;
    }

    public function stDomain()
    {

    }


}