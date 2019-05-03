<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 08.07.2018
 * Time: 12:26
 */

class Cart
{

    public static function  addProduct($id)
    {
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            // То заполним наш массив товарами
            $productsInCart = $_SESSION['products'];
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }
// считаем кол. товаров
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

// существует ли сессия
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
// сумма товаров с корзины
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    /*public static function delCartProd($id)
    {
        ob_start();
        unset($_SESSION['products'][$id]);
        header("Location: /");
        ob_end_flush();
    } */

    public static function printMsgContentEmail($orderId,$usName,$productList){

        $counterProdList= count($productList);
        $buf= "";
        $prodListBuf = "";
        $fullPrice = 0;
        $url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';
        $url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        $rowOpen = '<table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">';

        $rowClose = ' </tr></tbody></table>';

        for($i=0;$i<$counterProdList;$i++){
            if($i % 3 == 0){
                $buf.='  <th class="product-column small-12 large-4 columns first" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 177.33333px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;"><img class="product-column__img" src="'.$url.'/template/img/'.$productList[$i]["image"].'" alt style="-ms-interpolation-mode: bicubic; clear: both; display: block; height: 240px; max-width: 100%; outline: 0; text-decoration: none; width: 100%;">
                            <h2 class="product-column__price text-center" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;">'.$productList[$i]["price"].'</h2><a href="#" product-column__link="product-column__link" style="Margin: 0; color: #13750f; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                              <h2 class="product-column__title text-center" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;">'.$productList[$i]["name"].'</h2></a>
                          </th></tr></table></th>';
                $prodListBuf .= $rowOpen.$buf.$rowClose;
                $buf="";
            } else {
                $buf.='  <th class="product-column small-12 large-4 columns first" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 177.33333px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;"><img class="product-column__img" src="'.$url.'/template/img/'.$productList[$i]["image"].'" alt style="-ms-interpolation-mode: bicubic; clear: both; display: block; height: 240px; max-width: 100%; outline: 0; text-decoration: none; width: 100%;">
                            <h2 class="product-column__price text-center" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;">'.$productList[$i]["price"].'</h2><a href="#" product-column__link="product-column__link" style="Margin: 0; color: #13750f; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                              <h2 class="product-column__title text-center" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: center; word-wrap: normal;">'.$productList[$i]["name"].'</h2></a>
                          </th></tr></table></th>';
            }

            $fullPrice += $productList[$i]["price"];

        }

        $predMsg ='              <table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="15px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="info float-center" align="center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                <tbody>
                  <tr style="padding: 0; text-align: left; vertical-align: top;">
                    <td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                      <table align="center" class="container" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                          <th class="info-column small-12 large-4 columns first" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 177.33333px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <h2 class="info-column__usname" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; word-wrap: normal;">'.$usName.'</h2>
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="5px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 5px; font-weight: 400; hyphens: auto; line-height: 5px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <p class="info-column__code" style="Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">Номер заказа: '.$orderId.'</p>
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="5px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 5px; font-weight: 400; hyphens: auto; line-height: 5px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <p class="info-column__code" style="Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">Стоимость: '.$fullPrice.' руб.</p>
                          </th></tr></table></th>
                          <th class="info-column small-12 large-8 columns last" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 370.66667px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <p class="info-column__msg" style="Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">Спасибо за заказ! Наш менеджер свяжется с вами через некоторое время.</p>
                          </th></tr></table></th>
                        </tr></tbody></table>
                      </td></tr></tbody></table>
                    </td>
                  </tr>
                </tbody>
              </table>';

        $contentWrapOpen = '<table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="15px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="product float-center" align="center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                <tbody>
                  <tr style="padding: 0; text-align: left; vertical-align: top;">
                    <td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                      <table align="center" class="container" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        ';

        $contentWrapClose = '</td></tr></tbody></table></td></tr></tbody></table>';



        
        return $predMsg.$contentWrapOpen.$prodListBuf.$contentWrapClose;
    }

}