<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 08.07.2018
 * Time: 12:49
 */

include_once ROOT . '/views/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$price = include ($paramsPath); ?>

<?php include_once ROOT . '/views/include/banner.php'; ?>

<?php if ($result): ?>
    <div class="animated slideInLeft"><p class="msg-send">Заказ оформлен. Мы Вам перезвоним.</p></div>
<?php else: ?>
    <div class="animated slideInLeft"><p class="msg-send">Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, руб.</p></div>
    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="animated slideInLeft">
            <ul class="msg-send-error">
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php endif; ?>


    <section id="cart_items" style="margin-top: 6vw;margin-bottom: 2vw;">
    <div class="container">
        <div class="row">

            <?php require_once ROOT . '/views/include/sidebar.php' ?>


            <div class="col-sm-9">
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваш Email<span>*</span></label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="<?php echo $userEmail;?>" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваш телефон<span>*</span></label>
                            <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваше имя<span>*</span></label>
                            <input type="text" class="form-control" name="user" id="exampleFormControlInput1" value="<?php echo $userName;?>" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Уточнения по заказу</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="msg" rows="3"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mb-2">Оформить заказ</button>
                    </form>
            </div>
        </div>
    </div>

</section> <!--/#cart_items-->

<?php include_once ROOT . '/views/footer.php' ?>
