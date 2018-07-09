<?php

class Order
{

    public static function save($userName, $userPhone, $userComment,$userEmail, $userId, $products)
    {
        $products = json_encode($products);

        if($userId==false) {$userId=0;}
        $orderTab=Db::dbTableName('order');
        $db = Db::getConnection();
        $sql = "INSERT INTO $orderTab (name, phone, comments,email, us_id, product) VALUES (:user_name, :user_phone, :user_comment,:user_email, :user_id, :product)";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':product', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrdersList()
    {
        $orderTab=Db::dbTableName('order');
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query("SELECT id, name, phone, date, status FROM $orderTab ORDER BY id DESC");
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['name'];
            $ordersList[$i]['user_phone'] = $row['phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    /**
     * Возвращает заказ с указанным id
     * @param integer $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {

        $orderTab=Db::dbTableName('order');
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM $orderTab WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        $orderTab=Db::dbTableName('order');
        $db = Db::getConnection();


        $sql = "DELETE FROM $orderTab WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует заказ с заданным id
     */
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        $orderTab=Db::dbTableName('order');
        $db = Db::getConnection();

        $sql = "UPDATE $orderTab
            SET 
                name = :user_name, 
                phone = :user_phone, 
                comments = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
