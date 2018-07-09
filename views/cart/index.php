<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 08.07.2018
 * Time: 12:49
 */

include_once ROOT . '/views/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$price = include ($paramsPath);
?>

<?php include_once ROOT . '/views/include/banner.php'; ?>

<section id="cart_items" style="margin-top: 6vw;margin-bottom: 2vw;">
    <div class="container">
        <div class="row">

            <?php require_once ROOT . '/views/include/sidebar.php' ?>


            <div class="col-sm-9">
                <?php if(isset($_SESSION['products'])): ?>
                    <form action="#" method="post">
                <div class="table-responsive cart_info" >
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Общая</td>
                            <td class="description">информация</td>
                            <td class="price">Цена</td>
                            <td class="quantity">Кол.</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $cartProd): ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img id="cart-img" src="/template/images/shop/<?php echo $cartProd['image'] ?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><?php echo $cartProd['name'] ?></h4>
                                    <p><?php echo $cartProd['code'] ?></p>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo $cartProd['price']*$_SESSION['products'][$cartProd['id']]." ".$price['price'] ?></p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php echo $_SESSION['products'][$cartProd['id']]?></p>
                                </td>
                                <td class="cart_delete">
                                    <button type="submit" name="del-prod" class="btn btn-danger" value="<?php echo $cartProd['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                    </form>
                    <button type="button" class="btn btn-success"><a href="/cart/check" style="color:#fff;">Заказать</a></button>
                <?php else: ?>
                <h3>В корзине нет товаров</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section> <!--/#cart_items-->

<?php include_once ROOT . '/views/footer.php' ?>
