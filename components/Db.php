<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 20:31
 */

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_setting.php';
        $params = include ($paramsPath);

        $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);

        return $db;
    }

    public static function dbTableName($name)
    {
        $optionsPath = ROOT.'/config/config_site.php';
        $options = include ($optionsPath);
        $tab_name= $options['prefix'].$name;
        return $tab_name;
    }
}