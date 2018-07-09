<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 08.07.2018
 * Time: 12:15
 */

class CartController
{
    public function actionAdd($id)
    {
        // Добавляем товар в корзину синхронно
        Cart::addProduct($id);

        // Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        // Добавляем товар в корзину асинхронно
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        $cat = array();
        $cat = Category::getCategoriesList();

        $catId = 0;

        $productsInCart = false;

        // Получим данные из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        if (isset($_POST['del-prod'])) {
            $idProdDel = $_POST['del-prod'];
            ob_start();
            unset($_SESSION['products'][$idProdDel]);
            header("Location: /cart");
            ob_end_flush();
        }

        require_once(ROOT . '/views/cart/index.php');

        return true;
    }

    public function actionCheck()
    {

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;


        $result = false;


        // Форма отправлена?
        if (isset($_POST['submit'])) {

            $userName = $_POST['user'];
            $userPhone = $_POST['phone'];
            $userComment = $_POST['msg'];
            $userEmail = $_POST['email'];
            // Валидация полей
            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            // Форма заполнена корректно?
            if ($errors == false) {
                // Форма заполнена корректно? - Да
                // Сохраняем заказ в базе данных
                // Собираем информацию о заказе
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }
                // Сохраняем заказ в БД
                $result = Order::save($userName, $userPhone, $userComment,$userEmail, $userId, $productsInCart);
                if ($result) {
                    // Оповещаем администратора о новом заказе

                    $paramsPath = ROOT.'/config/config_site.php';
                    $send_mail = include ($paramsPath);
                    $adminEmail = $send_mail['MyEmail'];
                    $message = "У нас новый заказ: ".$send_mail['msg']." От".$userName.";<br> номер тел.:".$userPhone.";<br>Email:".$userEmail."<br><br> Комментарий: ".$userComment;
                    $subject = $send_mail['subject'];
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            // Форма отправлена? - Нет
            // Получием данные из корзины
            $productsInCart = Cart::getProducts();

            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                header("Location: /");
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров

                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;
                $userEmail = false;
                // Пользователь авторизирован?
                if (User::isGuest()) {
                    // Нет
                    // Значения формы пустые
                } else {
                    // Да, авторизирован
                    // Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    // Подставляем в форму
                    $userName = $user['name'];
                    $userEmail= $user['email'];
                }
            }
        }

        require_once(ROOT . '/views/cart/check.php');

        return true;
    }

}