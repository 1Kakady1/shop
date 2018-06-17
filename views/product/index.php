
<?php include_once ROOT . '/views/header.php' ?>

<section>
    <div class="container" style="    margin-top: 4vw;">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($cat as $catItem): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="product/cat/<?php echo $catItem['id'] ?>"><?php echo $catItem['name'] ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div><!--/category-products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Последние товары</h2>
                <div class="features_items" style="display:  flex;/* justify-content:  start; */flex-flow: row   wrap;"><!--features_items-->
                    <?php foreach ($latestProducts as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/template/images/shop/<?php echo $product['image'] ?>" alt="<?php echo $product['image'] ?>" />
                                    <h2><?php echo $product['price'] ?></h2>
                                    <p><?php echo $product['name'] ?></p>
                                    <a href="/product/<?php echo $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                                <?php if($product['is_new']): ?>
                                <img src="/template/images/new.png" class="new" alt="">
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <ul class="pagination" style="    display: flex;">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>

<?php include_once ROOT . '/views/footer.php' ?>

