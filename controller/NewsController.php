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
        require_once (ROOT.'/views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
       if($id){
           $newsItem = News::getNewsItemById($id);

           echo '<pre>';
           print_r($id);
           var_dump($newsItem);
           echo '</pre>';
           echo 'actionView = '.$id;

       }
        return true;
    }
}