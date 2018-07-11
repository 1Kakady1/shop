<?php $banner=Functions::getBanner(12,13,14) ?>
<div id="brand">
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <?php foreach ($banner as $ban): ?>
        <div class="mySlides fade">
            <img src="/template/images/banner/<?php echo $ban['info'] ?>" style="width:100%;">
        </div>
        <?php endforeach; ?>
<!--
        <div class="mySlides fade">
            <img src="/template/images/banner/as.jpg" style="width:100%;">
        </div>

        <div class="mySlides fade">
            <img src="/template/images/banner/bn2.png" style="width:100%;">
        </div>
-->
    </div>

</div>