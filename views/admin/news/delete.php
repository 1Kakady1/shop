<?php include ROOT . '/views/admin/header.php'; ?>

<section id="bg-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12"> <h4>Удалить  #<?php echo $id; ?></h4></div>
            <div class="col-md-12"> <p>Вы действительно хотите удалить?</p></div>
            <div class="col-md-12">
                <form method="post">
                    <input type="submit" class="btn btn-primary" name="submit" value="Удалить" />
                    <a href="/admin/novelty"><button type="button" class="btn btn-primary">Нет</button></a>
                </form>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer.php'; ?>

