<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */

include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        require_once(ROOT . '/views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
       if($id){
           $newsItem = News::getNewsItemById($id);
           $newsGallery = News:: getNewsGalleryItemById($id);
           require_once(ROOT . '/views/news/article_news.php');
       }
        return true;
    }
}