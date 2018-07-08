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

}
