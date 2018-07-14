<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.06.2018
 * Time: 16:16
 */

class Category
{

    public static function getCategoriesList()
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();

        $catList = array();

        $result = $db->query("SELECT id, name FROM $catTab ORDER BY sort_order ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()){

            $catList[$i]['id'] = $row['id'];
            $catList[$i]['name'] = $row['name'];
            $i++;
        }

        return  $catList;
    }

    public static function getCategoriesListAdmin()
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();

        // Запрос к БД
        $result = $db->query("SELECT id, name, sort_order, status FROM $catTab ORDER BY sort_order ASC");

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }


    public static function deleteCategoryById($id)
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();

        // Текст запроса к БД
        $sql = "DELETE FROM $catTab WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();


        $sql = "UPDATE $catTab
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getCategoryById($id)
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM  $catTab WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function createCategory($name, $sortOrder, $status)
    {
        $catTab=Db::dbTableName('category');
        $db= Db::getConnection();


        $sql = "INSERT INTO $catTab (name, sort_order, status) VALUES (:name, :sort_order, :status)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }



}