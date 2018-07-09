<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.07.2018
 * Time: 11:11
 */

class AdminController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        $ordersList = Order::getOrdersList();

        require_once (ROOT.'/views/admin/index.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);
            header("Location: /admin/order/view/$id");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    /**
     * Action для страницы "Просмотр заказа"
     */
    public function actionView($id)
    {
        // Проверка доступа
        self::checkAdmin();
        $order = Order::getOrderById($id);

        $productsQuantity = json_decode($order['product'], true);

        $productsIds = array_keys($productsQuantity);

        $products = Product::getProdustsByIds($productsIds);
       // var_dump($order);
        require_once(ROOT . '/views/admin/order/view.php');
        return true;
    }

    /**
     * Action для страницы "Удалить заказ"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);
            header("Location: /admin/order");
        }

        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }

}


