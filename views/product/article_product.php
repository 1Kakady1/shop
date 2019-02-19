
<?php include_once ROOT . '/views/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$price = include ($paramsPath);
$comNot = 0;
?>

<?php include_once ROOT . '/views/include/banner.php' ?>

<?php   if ($result): ?>
    <div class="animated slideInLeft"><p class="msg-send">Ваш комментарий добавлен.</p></div>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="animated slideInLeft">
            <ul class="msg-send-error">
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
<?php endif; ?>

<main role="main">


    <div class="container marketing">

        <h2 class="featurette-heading"><?php echo $productItem['name'] ?></h2>
        <div><span>Код товара:<?php echo $productItem['code'] ?></span></div>
        <hr class="featurette-divider">

        <div class="row featurette">



            <div class="col-md-7 order-md-2 wow slideInRight">
                <div><button id="hideInfo1">Описание</button><button id="hideInfo2">Характиристики</button></div>
                <p class="lead " id="info1"><?php echo $productItem['description'] ?></p>
                <div class="lead hidden" id="info2">
                    <h2>Характиристики</h2>
                    <?php $buf = explode(";",$productItem['info']); foreach ($buf as $productInfoList): ?>
                       <div class="table"><?php echo $productInfoList; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-5 order-md-1 wow slideInLeft">
                <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $productItem['image'] ?>" alt="500x500" style="width: 500px; height: 500px;"  data-holder-rendered="true">

                <div class="col-md-12 " style="margin-top: 1vw;">
                    <span class="priceProd"> Цена: <?php echo $productItem['price']." ".$price['price']; ?></span>
                    <a href="/cart/addAjax/<?php echo $productItem['id'] ?>" data-id="<?php echo $productItem['id']?>" class="btn btn-success add-to-cart" id="new-add"><i class="fa fa-shopping-cart"></i>В корзину</a>
                    <span class="new-add animated" id="add">Товар добавлен</span>
                </div>
            </div>

        </div>

        <?php if($productItem['gallery'] != NULL): ?>

            <div class="row gallery">
                <div class="title_gallery">
                    <h1 class="featurette-heading">
                        <span class="text-muted">Gallery</span>
                    </h1>
                </div>
                <div class="popup-gallery">
                    <?php foreach ($productGallery as $productGList): ?>
                        <a href="/template/images/shop/<?php echo $productGList ?>" title="<?php echo $productGList ?>"><img src="/template/images/shop/<?php echo $productGList ?>" class="image" alt="img"></a>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif;?>

        <hr class="featurette-divider">

        <?php include_once ROOT . '/views/include/recommended-slider.php' ?>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    <div class="container-fluid" style="margin-bottom: 2vw;">
        <a href="#comments"></a>
        <h2 class=" title_comments featurette-heading">Комментарии</h2>
        <div class="row">
            <div class="col-md-6">
                <div id="list-comments">
                    <ul>
                        <?php if($listComments): ?>
                    <?php foreach ($listComments as $comments): ?>
                        <li class="wow slideInUp"><!--comments 1 -->
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">
                                    <?php if($comments['usimg'] == NULL): ?>
                                        <img src="https://ru.gravatar.com/avatar/<?php echo md5($comments['email'])?>?s=125" alt="c1">
                                    <?php else: ?>
                                        <img src="/template/images/avatar/<?php echo $comments['usimg'];?>" alt="c1">
                                    <?php endif;  ?>
                                </div>
                                <div class="msg-com">
                                    <h4> <?php echo $comments['author'].": ".$comments['nickname']?><span>/ <?php echo $comments['pupdate']?></span></h4>
                                    <p><?php echo $comments['text']?></p>
                                </div>

                            </div>
                        </li> <!--comments 1 end-->

                    <?php endforeach; else:?>
                    <li><h4><span>Будь первым, кто оставмит комментарий!!!</span></h4></li>
                   <?php $comNot = 1;endif; ?>
                    </ul>
                </div>
                <?php if(count($listComments) > 0 && $comNot != 1): ?>
                <div class="comments-loader">
                    <button type="submit" id="com-load" name="submit">Больше +</button>
                    <div id="com-preload">
                        <div class="prod-send"></div>
                        <span class="wow slideInUp"></span>
                    </div>
                </div>

                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div id="form-content">

                    <div class="name-f-msg">

                        <form action="#" method="post" class="main_flex__nowrap disp">
                            <div id="left_form" <?php if(isset($_SESSION['user'])){echo 'style="display: none"';} ?> >
                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="/template/images/p.png" alt="">
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Ваше имя" value="<?php echo $name?>">
                                </div>

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="/template/images/msg.png" alt="">
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email?>">
                                </div>
                                <div id="error-msg">
                                    <div class="prod-send"></div>
                                    <span class="wow slideInUp"></span>
                                </div>

                            </div>

                            <div id="right_form">

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <textarea type="text" name="msg" id="msg" placeholder="Сообщение" value="<?php echo $msg?>"></textarea>
                                </div>
                                <button type="submit" id="send" name="submit">отправить</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include_once ROOT . '/views/footer.php' ?>

