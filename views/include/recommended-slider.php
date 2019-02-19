<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 19.02.2019
 * Time: 16:36
 */
?>
<div class="recomended">
    <h2 class="recomended__title">Хит продажи</h2>
    <section class="center slider">
        <?php foreach ($recommendedProducts as $recommendedItem): ?>
            <a href="/product/<?php echo $recommendedItem['id'] ?>" class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="/template/images/shop/<?php echo $recommendedItem['image'] ?>" alt="<?php echo $recommendedItem['image'] ?>" />
                            <h2><?php echo $recommendedItem['price']." ".$price["price"] ?></h2>
                            <p><?php echo $recommendedItem['name'] ?></p>
                            <p>Категория: <?php echo $recommendedItem['cat'] ?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </section>
</div>

