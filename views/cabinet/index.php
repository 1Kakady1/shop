<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 02.07.2018
 * Time: 18:39
 */

include_once ROOT.'/views/header.php'?>
<div class="animated slideInLeft"><p class="msg-send">Никнейм служит для восстановления пароля. Никому не сообщайте его!!!</p></div>

<main role="main" class="col-md-12 ml-sm-auto col-lg-12 "><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

        <div class="col-md-12" id="l-cab">
            <button type="button" class="btn btn-success"><a href="/cabinet">Ваши заказы</a></button>
            <button type="button" class="btn btn-success"><a href="/cabinet/edit">Изменить профиль</a></button>
        </div>
    <h2>Заказы</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена(шт.)</th>
                <th>Колличество</th>
                <th>Дата оформления</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            while ($i<count($order)):
                $listProdUser=Product::getTableProd($order[$i]);
                 foreach ($listProdUser as $productsList):
                     $productsQuantity = json_decode($order[$i]['product'], true);
                ?>
                <tr>
                    <td><?php echo $productsList['name']; ?></td>
                    <td><?php echo $productsList['price']; ?></td>
                    <td><?php echo $productsQuantity[$productsList['id']]; ?></td>
                    <td><?php echo $order[$i]['date']; ?></td>
                    <td><?php echo Order::getStatusText($order[$i]['status']); ?></td>
                </tr>
            <?php endforeach;$i++;endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once ROOT.'/views/footer.php';?>
