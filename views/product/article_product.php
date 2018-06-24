
<?php include_once ROOT . '/views/header.php';
$paramsPath = ROOT.'/config/config_site.php';
$price = include ($paramsPath);
?>

<main role="main">


    <div class="container marketing">

        <h2 class="featurette-heading"><?php echo $productItem['name'] ?></h2>
        <div><span>Код товара:<?php echo $productItem['code'] ?></span></div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <div><button id="hideInfo1">Описание</button><button id="hideInfo2">Характиристики</button></div>
                <p class="lead " id="info1"><?php echo $productItem['description'] ?></p>
                <div class="lead hidden" id="info2">
                    <h2>Характиристики</h2>
                    <?php $buf = explode(";",$productItem['info']); foreach ($buf as $productInfoList): ?>
                       <div class="table"><?php echo $productInfoList; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-5 order-md-1">
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
    <div class="container-fluid">
        <h2 class=" title_comments featurette-heading">Leave a Comment</h2>
        <div class="row">
            <div class="col-md-6">
                <div id="list-comments">
                    <ul>
                        <li><!--comments 1 -->
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">
                                    <img src="img/7.jpg" alt="c1">
                                </div>
                                <div class="msg-com">
                                    <h4>ShaneFreer <span>/ 58 minutes ago</span></h4>
                                    <p>great post brainartworks</p>
                                </div>

                            </div>

                        </li> <!--comments 1 end-->

                        <li><!--comments 1 -->
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">
                                    <img src="img/7.jpg" alt="c1">
                                </div>
                                <div class="msg-com">
                                    <h4>ShaneFreer <span>/ 58 minutes ago</span></h4>
                                    <p>great post brainartworks</p>
                                </div>

                            </div>

                        </li> <!--comments 1 end-->

                        <li><!--comments 1 -->
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">
                                    <img src="img/7.jpg" alt="c1">
                                </div>
                                <div class="msg-com">
                                    <h4>ShaneFreer <span>/ 58 minutes ago</span></h4>
                                    <p>great post brainartworks</p>
                                </div>

                            </div>

                        </li> <!--comments 1 end-->


                    </ul>


                </div>

            </div>
            <div class="col-md-6">
                <div id="form-content">

                    <div class="name-f-msg">

                        <form action="" class="main_flex__nowrap">
                            <div id="left_form">
                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="img/p.png" alt="">
                                    </div>
                                    <input type="text" placeholder="Name">
                                </div>

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <div class="form_icon">
                                        <img src="img/msg.png" alt="">
                                    </div>
                                    <input type="text" placeholder="Email">
                                </div>

                            </div>

                            <div id="right_form">

                                <div class="input main_flex__nowrap flex__align-items_center">
                                    <textarea name="" id="" placeholder="Message"></textarea>
                                </div>
                                <button>Post a Comment</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>







</main>

<?php include_once ROOT . '/views/footer.php' ?>

