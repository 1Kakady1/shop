<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */

include_once ROOT.'/models/News.php';
include_once ROOT.'/models/Home.php';

class NewsController
{
    public function actionIndex()
    {
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $newsList = array();
        $newsList = News::getNewsList();

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $randNewsId = array();
        $randNewsId = Home::prodRandId("news");

        require_once(ROOT . '/views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        if($id){

           $cat = array();
           $cat = Category::getCategoriesList();
           $catId = 0;

           $newsItem = News::getNewsItemById($id);
           $newsGallery = News:: getNewsGalleryItemById($id);
           require_once(ROOT . '/views/news/article_news.php');
       }
        return true;
    }
}