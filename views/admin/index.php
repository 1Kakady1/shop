<?php include_once ROOT.'/views/admin/header.php'?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
        </div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <h2>Section title</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID заказа</th>
                <th>Имя покупателя</th>
                <th>Телефон покупателя</th>
                <th>Дата оформления</th>
                <th>Статус</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ordersList as $order): ?>
            <tr>
                <td>
                    <a href="/admin/order/view/<?php echo $order['id']; ?>">
                        <?php echo $order['id']; ?>
                    </a>
                </td>
                <td><?php echo $order['user_name']; ?></td>
                <td><?php echo $order['user_phone']; ?></td>
                <td><?php echo $order['date']; ?></td>
                <td><?php echo Order::getStatusText($order['status']); ?></td>
                <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i>d</a></td>
                <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i>dd</a></td>
                <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a>dd</td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
<?php include_once ROOT.'/views/admin/footer.php'?>
