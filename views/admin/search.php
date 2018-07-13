<?php include ROOT . '/views/admin/header.php'; ?>


<section>

    <div>
        <h4>Список товаров</h4>
        <a href="/admin/prod/create" class="btn btn-default back"><i class="fas fa-plus"></i> Добавить товар</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <form method="post">
                        <input type="text" name="search" class="form-control"/>
                        <button type="submit" name="b-search" class="btn btn-primary" id="mg-TB">Найти</button>
                    </form>
                </div>

            </div>
            <div class="col-md-12">

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($productsList as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['code']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><a href="/admin/prod/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fas fa-file-invoice"></i></a></td>
                            <td><a href="/admin/prod/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fas fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>



<?php include ROOT . '/views/admin/footer.php'; ?>

