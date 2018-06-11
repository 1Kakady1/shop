<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 23:15
 */
include_once ROOT.'/models/News.php';
include_once ROOT.'/models/Functions.php';
class HomeController
{
    public function homeContent()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        require_once (ROOT.'/views/index.php');
        return true;
    }

    public function stDomain()
    {

    }


}