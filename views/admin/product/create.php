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

                    <p>Описание</p>
                    <textarea name="description" rows="8"></textarea>
                    <br/><br/>
                    <p>Характреристки (значения разделять ';')</p>
                    <textarea name="info" rows="8"></textarea>
                    <br/><br/>

                    <p>Изображение товара</p>
                    <input type="file" name="image" placeholder="" value="">

                    <div id="gall">
                        <p>Галлерея</p>
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
                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="">

                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="">

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

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

