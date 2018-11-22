<?php

class Functions
{
    public function stripToDomainName($suri = '')
    {
        $suri = strtolower(trim($suri));

        $suri = preg_replace('%^(http:\/\/)*(www.)*%usi', '', $suri);

        $suri = preg_replace('%\/.*$%usi', '', $suri);

        return $suri;
    }

    public function print_url_link()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            //var_dump( $_SERVER['REQUEST_URI']);
            $link_url = trim($_SERVER['REQUEST_URI'], '/');
            $buf = explode("/", $link_url);
            return $buf[0];
        }
    }

    public  static  function getTitleById($id,$tabName)
    {
        $id = intval($id);

        if($id) {
            $hTab=Db::dbTableName($tabName);
            $db= Db::getConnection();

            $result = $db->query("SELECT * FROM $hTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $productItem = $result->fetch();

            return $productItem;
        }
    }

    public function print_title()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {

            $link_url = explode('/',$_SERVER['REQUEST_URI']);
        }

        if(count($link_url)==3 && $link_url[2] != null){
           $bufTitle =  self::getTitleById($link_url[2],$link_url[1]);
           if(array_key_exists("title", $bufTitle)){
               return $bufTitle['title'];
           }

            if(array_key_exists("name", $bufTitle)){
                return $bufTitle['name'];
            }

        } else {
            switch ($link_url[1]) {
                case "":return 'Главная';
                case "product":return 'Товары';
                case "news":return 'Новости';
                case "user":return 'Работа с данными';
                case "cabinet":return 'Ваш личный кабинет';
                case "contact":return 'Контакты';
                case "cart":return 'Корзина';
                case "admin":return 'Admin';
                case "search":return 'Поиск';
            }
        }


    }

    public static function getBanner($id1,$id2,$id3)
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $sql = "SELECT * FROM $settingTab WHERE id=$id1 OR id=$id2 OR id=$id3";
        $result = $db->query($sql);
        $st=array();

        $i = 0;
        while ($row = $result->fetch()) {
            $st[$i]['id'] = $row['id'];
            $st[$i]['info'] = $row['info'];
            $i++;
        }
        return $st;
    }

    public static function getAddress()
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $sql = "SELECT * FROM $settingTab WHERE id=4 OR id=5 OR id=6 OR id=7";
        $result = $db->query($sql);
        $st=array();

        $i = 0;
        while ($row = $result->fetch()) {
            $st[$i]['id'] = $row['id'];
            $st[$i]['info'] = $row['info'];
            $i++;
        }
        return $st;
    }

}
?>