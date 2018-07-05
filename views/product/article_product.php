
<?php include_once ROOT . '/views/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$price = include ($paramsPath);
?>

<?php include_once ROOT . '/views/include/banner.php' ?>

<?php   if ($result): ?>
    <div class="animated slideInLeft"><p class="msg-send">Ваше комментарий добавлен.</p></div>
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
                    <span class="priceProd"> Стоимость за одну шт.: <?php echo $productItem['price']." ".$price['price']; ?></span>
                    <form action="" class="za">
                        <button class="btn" >Купить</button>
                        <span>колличество:</span>
                        <input type="text" class="form-control" value="1">
                    </form>
                    <p>В наличии есть</p>
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
                <?php foreach ($productGallery as $productGList): ?>
                    <div class="col-md-2"><img src="../template/images/news/<?php echo $productGList ?>" class="image" alt=""></div>
                <?php endforeach; ?>
            </div>

        <?php endif;?>

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
                   <?php endif; ?>




                    </ul>
                </div>

            </div>

            <div class="col-md-6">
                <div id="form-content">

                    <div class="name-f-msg">

                        <form action="#" method="post" class="main_flex__nowrap">
                            <div id="left_form" <?php if(isset($_SESSION['user'])){echo 'style="display: none"';} ?> >
                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="/template/images/p.png" alt="">
                                    </div>
                                    <input type="text" name="name" placeholder="Ваше имя" value="<?php echo $name?>">
                                </div>

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="/template/images/msg.png" alt="">
                                    </div>
                                    <input type="email" name="email" placeholder="Email" value="<?php echo $email?>">
                                </div>

                            </div>

                            <div id="right_form">

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <textarea type="text" name="msg" id="" placeholder="Сообщение" value="<?php echo $msg?>"></textarea>
                                </div>
                                <button type="submit" name="submit">отправить</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>







</main>

<?php include_once ROOT . '/views/footer.php' ?>

