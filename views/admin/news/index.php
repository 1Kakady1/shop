<?php include ROOT . '/views/admin/header.php'; ?>


<section>

    <div>
        <h4>Все новости</h4>
        <a href="/admin/novelty/create" class="btn btn-default back"><i class="fas fa-plus"></i>Новая новасть</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Дата создания</th>
                        <th>Контент</th>
                        <th>Автор</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($newsList as $news): ?>
                        <tr>
                            <td><?php echo $news['id']; ?></td>
                            <td><?php echo $news['title']; ?></td>
                            <td><?php echo $news['date']; ?></td>
                            <td><?php echo $news['short_content']; ?></td>
                            <td><?php echo $news['autor_name']; ?></td>
                            <td><a href="/admin/novelty/update/<?php echo $news['id']; ?>" title="Редактировать"><i class="fas fa-file-invoice"></i></a></td>
                            <td><a href="/admin/novelty/delete/<?php echo $news['id']; ?>" title="Удалить"><i class="fas fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>



<?php include ROOT . '/views/admin/footer.php'; ?>

