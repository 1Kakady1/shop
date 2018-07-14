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

        $result = $db->query("SELECT id, title, date, short_content, content, preview FROM $newsTab ORDER BY date DESC LIMIT 10");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['preview'];

            $i++;
        }

        return  $newsList;
    }

    public  static  function getNewsListHome()
    {

        $newsTab=Db::dbTableName('news');
        $db= Db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT id, title, date, short_content, content, preview FROM $newsTab ORDER BY id ASC LIMIT 10");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['preview'];

            $i++;
        }

        return  $newsList;
    }

    public  static  function getNewsListFull()
    {

        $newsTab=Db::dbTableName('news');
        $db= Db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT id, title, date, short_content, content, preview FROM $newsTab ORDER BY date DESC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['preview'];

            $i++;
        }

        return  $newsList;
    }

    public  static  function getNewsListFullAdmin()
    {

        $newsTab=Db::dbTableName('news');
        $db= Db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT * FROM $newsTab ORDER BY date DESC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['preview'];
            $newsList[$i]['autor_name'] = $row['autor_name'];
            $i++;
        }

        return  $newsList;
    }

    public static function deleteNewsById($id)
    {
        $newsTab=Db::dbTableName('news');
        $db = Db::getConnection();

        $sql = "DELETE FROM $newsTab WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createNews($options)
    {
        $newsTab=Db::dbTableName('news');
        $db = Db::getConnection();

        $gallery="";$i=0;
$k=0;
        while($i<count($options['gal']))
        {
            if($options['gal'][$i] != false)
            {
                $gallery.=$options['gal'][$i].";";
            } else {$k++;}

            $i++;
        }

        if($k>=count($options['gal'])) {$gallery=NULL;}

        $sql = 'INSERT INTO  '. $newsTab
            . ' (title,short_content,content,autor_name,preview,gallery)'
            . 'VALUES '
            . '(:title,:short_content,:content,:autor_name,:preview,:gallery)';

        // Получение и возврат результатов. Используется подготовленный запрос
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':autor_name', $options['info'], PDO::PARAM_STR);
        $result->bindParam(':preview', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':gallery', $gallery, PDO::PARAM_STR);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function updateNewsById($id, $options)
    {
        $newsTab=Db::dbTableName('news');
        $db = Db::getConnection();

        $gallery="";$i=1;

        while($i<count($options['gal']))
        {
            if($options['gal'][$i] != false)
            {
                $gallery.=$options['gal'][$i].";";
            }

            $i++;
        }

        if($gallery == ''){$gallery = NULL; }

        $sql = "UPDATE $newsTab
            SET 
                title = :title, 
                short_content = :short_content,
                content = :content, 
                autor_name = :autor_name, 
                preview = :preview, 
                gallery = :gallery
            WHERE id = :id";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':autor_name', $options['info'], PDO::PARAM_STR);
        $result->bindParam(':preview', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':gallery', $gallery, PDO::PARAM_STR);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $result->execute();
    }

}