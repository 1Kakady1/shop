<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 23:15
 */
include_once ROOT.'/models/News.php';
include_once ROOT.'/models/Functions.php';
include_once ROOT.'/models/Home.php';

class HomeController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        $listSetting=array();
        $listSetting=Setting::getSetting();



        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $latestProducts = array();
        $latestProducts = Home::getLatestProducts(/*10*/);

        $randId = array();
        $randId = Home::prodRandId('product');

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        require_once(ROOT . '/views/home/index.php');
        return true;
    }



}