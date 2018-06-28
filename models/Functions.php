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

            $link_url = trim($_SERVER['REQUEST_URI'], '/');
            $buf = explode("/", $link_url);
            return $buf[0];
        }
    }

    public function print_title()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {

            $link_url = trim($_SERVER['REQUEST_URI'], '/');
            $buf = explode("/", $link_url);
        }

        switch ($buf[0]) {
            case "":return 'Главная';
            case "product":return 'Товары';
            case "news":return 'Новости';
            case "user":return 'Работа с данными';
        }

    }

}
?>