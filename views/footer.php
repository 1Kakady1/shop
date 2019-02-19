<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 21:21
 */
$footerInfo=Functions::getAddress();
$phone_array1 = explode("&", $footerInfo[1]['info']);
$linck_script = $title->print_url_link();
?>

<footer>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3"><p>© 2017-2018 Company</p></div>
        <div class="col-md-3"><p>Звоните нам по номерам:<br><span><?php $i=0; while ($i<count($phone_array1)){echo $phone_array1[$i]."<br>";$i++;}?></span></p></div>
        <div class="col-md-2"><p><p>Мы работаем:<br> <?php echo $footerInfo[3]['info']  ?>  </p></div>
        <div class="col-md-4">
            <div class="flr">
                <a href="#"><img src="/template/images/vk.png" alt="vk"></a>
                <a href="#"><img src="/template/images/telegram.png" alt="telegram"></a>
                <a href="#"><img src="/template/images/youtube.png" alt="youtube"></a>
             </div>

        </div>
    </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../template/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<!--<script src="/template/js/price-range.js"></script> -->
<!--<script src="/template/js/jquery.prettyPhoto.js"></script> -->
<script src="/template/js/wow.min.js"></script>
<!--<script src="/template/js/popper.min.js"></script>-->
<script src="/template/js/holder.min.js"></script>
<script src="/template/js/main.js"></script>
<?php if ($linck_script == 'product' || $linck_script == 'news'): ?>
    <script src="/template/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php endif;?>

<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });

        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });


    });
</script>


</body>
</html>
