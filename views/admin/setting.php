<?php include_once ROOT.'/views/admin/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$setting = include ($paramsPath);
?>

    <section >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Настройки рассылки</h5>
                    <form method="post">
                        <table class="table-admin-small table-bordered table-striped table">
                            <tr>
                                <td>Ед. цены:</td>
                                <td><?php echo $setting['price']?></td>
                            </tr>
                            <tr>
                                <td>Email для связи</td>
                                <td><input type="email" name="email" value="$"></td>
                            </tr>
                            <tr>
                                <td>Перенаправление на сайт</td>
                                <td><?php echo $setting['msg']?></td>
                            </tr>
                            <tr>
                                <td>Телефон для связи(если несколько тел., то разделить их &)</td>
                                <td><input type="text" name="tel" value="$"></td>
                            </tr>
                            <tr>
                                <td>Где Вы находитесь:</td>
                                <td><input type="text" name="adr" value="$"></td>
                            </tr>
                            <tr>
                                <td><b>Время работы:</b></td>
                                <td><input type="text" name="work" value="$"></td>
                            </tr>

                        </table>
                        <button type="submit" class="btn btn-primary" name="send1">Изменить</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h5>Слайдер новастей</h5>
                    <form method="post" id="select-st">

                        <select name="news1">
                            <option value="1">Новый заказ</option>
                            <option value="2">В обработке</option>
                            <option value="3">Доставляется</option>
                            <option value="4">Закрыт</option>
                        </select>

                        <select name="news2">
                            <option value="1">Новый заказ</option>
                            <option value="2">В обработке</option>
                            <option value="3">Доставляется</option>
                            <option value="4">Закрыт</option>
                        </select>

                        <select name="news3">
                            <option value="1">Новый заказ</option>
                            <option value="2">В обработке</option>
                            <option value="3">Доставляется</option>
                            <option value="4">Закрыт</option>
                        </select>

                        <button type="submit" class="btn btn-primary" name="send2">Изменить</button>
                    </form>
                </div>

                <div class="col-md-12" id="st-banner">
                        <h5 class="mg-top">Баннер</h5>
                        <form method="post" runat="server" enctype="multipart/form-data">
                            <div class="row" style="align-items: flex-end;">
                                <div class="col-md-4">
                                    <img src="/template/images/banner/bn1.png" alt="b1">
                                    <input type="file" class="form-control-file" name="picture1"/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/template/images/banner/bn2.png" alt="b2">
                                    <input type="file" class="form-control-file" name="picture2"/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/template/images/banner/bn3.png" alt="b3">
                                    <input type="file" class="form-control-file" name="picture3"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mg-top" name="send3">Изменить</button>
                        </form>
                </div>
            </div>

        </div>
    </section>


<?php include_once ROOT.'/views/admin/footer.php'?>