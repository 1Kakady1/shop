<?php include ROOT . '/views/admin/header.php'; ?>

<section>
    <h4>Список категорий</h4>
    <div class="container">
        <div class="row">

            <a href="/admin/cat/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID категории</th>
                    <th>Название категории</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>
                        <td><?php echo Category::getStatusText($category['status']); ?></td>  
                        <td><a href="/admin/cat/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fas fa-file-invoice"></i></a></td>
                        <td><a href="/admin/cat/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer.php'; ?>

