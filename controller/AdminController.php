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

    public function actionSetting()
    {
        self::checkAdmin();
        $listSetting = array();
        $listSetting = Setting::getSetting();

        $newsList = array();
        $newsList = News::getNewsListFull();

        $banner = Functions::getBanner(12,13,14);


        if(isset($_POST['send3']))
        {
            if($_FILES['picture1']['name'] !== ''){
                $img1 = Setting::loadBanner(ROOT.'/template/images/banner/','bn1','picture1', 12);
            }

            if($_FILES['picture2']['name'] !== ''){
                $img2 = Setting::loadBanner(ROOT.'/template/images/banner/','bn2','picture2', 13);
            }

            if($_FILES['picture3']['name'] !== ''){
                $img3 = Setting::loadBanner(ROOT.'/template/images/banner/','bn3','picture3', 14);
            }

            header("Location: /admin/setting");
            exit;
        }

        if(isset($_POST['send1']))
        {
            ob_start();
            $email=$_POST['email'] ;
            $phone=$_POST['tel'] ;
            $adr=$_POST['adr'];
            $work=$_POST['work'];

            $result = Setting::updateSetting($email,$phone,$adr,$work);

            if( $result!= false)
            {
                $_SESSION['result'] = $result;
                header("Location: /admin/setting");
                ob_end_flush();
                exit;
            }


        }

        if(isset($_POST['send2']))
        {
            ob_start();
            $post1=$_POST['news1'] ;
            $post2=$_POST['news2'] ;
            $post3=$_POST['news3'];

            $result = Setting::updateNewsDb($post1,$post2,$post3);

            header("Location: /admin/setting");
            ob_end_flush();
            exit;

        }

        require_once (ROOT.'/views/admin/setting.php');
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
        require_once(ROOT . '/views/admin/order/update.php');
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

        require_once(ROOT . '/views/admin/order/delete.php');
        return true;
    }

}


