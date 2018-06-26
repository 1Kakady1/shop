<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Каталог</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php  foreach ($cat as $catItem): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="/product/cat/<?php echo $catItem['id'] ?>" class = "<?php if(  $catId == $catItem['id']){echo "active";} ?>"><?php echo $catItem['name']; ?></a></h4>
                    </div>
                </div>
            <?php endforeach;  ?>
        </div><!--/category-products-->


        <div class="shipping text-center"><!--shipping-->
            <img src="/template/images/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>