<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 15:34
 */
//include_once "./config/config_site.php"; $x1=$tb_prefix;
class News
{

    public  static  function getNewsGalleryItemById($id)
    {

        $id = intval($id);

        if($id) {
            $newsTab=Db::dbTableName('news');
            $db= Db::getConnection();

            $result = $db->query("SELECT gallery FROM $newsTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $BufGallery = $result->fetch();

            $newsGallery = explode(";",$BufGallery['gallery']);

            return $newsGallery;
        }
    }

    public  static  function getNewsItemById($id)
    {

        $id = intval($id);

        if($id) {
            $newsTab=Db::dbTableName('news');
            $db= Db::getConnection();

            $result = $db->query("SELECT * FROM $newsTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    public  static  function getNewsList()
    {

        $newsTab=Db::dbTableName('news');
        $db= Db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT id, title, date, short_content FROM $newsTab ORDER BY date DESC LIMIT 10");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];

            $i++;
        }

        return  $newsList;
    }
}