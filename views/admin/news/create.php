<?php include ROOT . '/views/admin/header.php'; ?>

<section>
    <div class="container">
        <form method="post" enctype="multipart/form-data" id="inp-bg">
        <div class="row">


            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-8">
                    <p>Изображение</p>
                    <input type="file" name="image" placeholder="" value="">

                    <div id="gall">
                        <p>Галерея</p>
                        <div class="img-avatar" id="img-avatar">
                            <img src="/template/images/z1.png" alt="" id="blah" >
                        </div>
                        <input type="file" name="g1" id="imgInp1">
                        <input type="file" name="g2" id="imgInp2">
                        <input type="file" name="g3" id="imgInp3">
                        <input type="file" name="g4" id="imgInp4">
                        <input type="file" name="g5" id="imgInp5">
                    </div>

            </div>

            <div class="col-lg-4">
                <div class="login-form">
                    <p>Описание</p>
                    <textarea name="description" rows="8"></textarea>
                    <br/><br/>
                    <p>Краткое описание</p>
                    <textarea name="short" rows="6"></textarea>
                    <br/><br/>
                        <p>Автор</p>
                        <input type="text" name="aut" placeholder="" value="">

                        <p>Назване</p>
                        <input type="text" name="title" placeholder="" value="">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">

                        <br/><br/>
                </div>
                </form>

            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/admin/footer.php'; ?>

