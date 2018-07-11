<?php include_once ROOT.'/views/admin/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$setting = include ($paramsPath);
?>

    <section id="bg-section">
        <?php if(isset($_SESSION['result'])):?>
            <div class="animated slideInLeft"><p class="msg-send">Данные были изменены!</p></div>
            <?php unset($_SESSION['result']); endif; ?>
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
                                <td><input type="email" name="email" value="<?php echo $listSetting[3]['info'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Перенаправление на сайт</td>
                                <td><?php echo $setting['msg']?></td>
                            </tr>
                            <tr>
                                <td>Телефон для связи(если несколько тел., то разделить их &)</td>
                                <td><input type="text" name="tel" value="<?php echo $listSetting[4]['info'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Где Вы находитесь:</td>
                                <td><input type="text" name="adr" value="<?php echo $listSetting[5]['info'] ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Время работы:</b></td>
                                <td><input type="text" name="work" value="<?php echo $listSetting[6]['info'] ?>"></td>
                            </tr>

                        </table>
                        <button type="submit" class="btn btn-primary" name="send1">Изменить</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h5>Слайдер новостей</h5>
                    <form method="post" id="select-st">

                        <select name="news1">
                            <?php foreach ($newsList as $newsItem): ?>
                                <option value="<?php echo $newsItem['id'] ?>" <?php if($newsItem['id']==$listSetting[8]['info']){echo "selected";}?>><?php echo $newsItem['title'] ?></option>
                            <?php endforeach; ?>

                        </select>

                        <select name="news2">
                            <?php foreach ($newsList as $newsItem): ?>
                                <option value="<?php echo $newsItem['id'] ?>" <?php if($newsItem['id']==$listSetting[9]['info']){echo "selected";}?>><?php echo $newsItem['title'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <select name="news3">
                            <?php foreach ($newsList as $newsItem): ?>
                                <option value="<?php echo $newsItem['id'] ?>" <?php if($newsItem['id']==$listSetting[10]['info']){echo "selected";}?>><?php echo $newsItem['title'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" class="btn btn-primary" name="send2">Изменить</button>
                    </form>
                </div>

                <div class="col-md-12" id="st-banner">
                        <h5 class="mg-top">Баннер</h5>
                        <form method="post" runat="server" enctype="multipart/form-data">
                            <div class="row" style="align-items: flex-end;">
                                <div class="col-md-4">
                                    <img src="/template/images/banner/<?php echo $banner[0]['info'] ?>" alt="b1">
                                    <input type="file" class="form-control-file" name="picture1"/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/template/images/banner/<?php echo $banner[1]['info'] ?>" alt="b2">
                                    <input type="file" class="form-control-file" name="picture2"/>
                                </div>
                                <div class="col-md-4">
                                    <img src="/template/images/banner/<?php echo $banner[2]['info'] ?>" alt="b3">
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