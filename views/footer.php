<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 21:21
 */
?>

<footer class="container-fluid">
    <div class="row">
        <div class="col-md-6"><p>© 2017-2018 Company</p></div>
        <div class="col-md-6">
            <div class="flr">
                <a href="#"><img src="/template/images/vk.png" alt="vk"></a>
                <a href="#"><img src="/template/images/telegram.png" alt="telegram"></a>
                <a href="#"><img src="/template/images/youtube.png" alt="youtube"></a>
             </div>

        </div>
    </div>

</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../template/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<!--<script src="/template/js/price-range.js"></script> -->
<!--<script src="/template/js/jquery.prettyPhoto.js"></script> -->
<script src="/template/js/wow.min.js"></script>
<script src="/template/js/popper.min.js"></script>
<script src="/template/js/holder.min.js"></script>
<script src="/template/js/main.js"></script>

<script type="text/javascript">

    // Wow Animations
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         true        // default
        }
    )
    wow.init();

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    document.getElementById('imgInp').onclick = function() {

        document.getElementById('img-avatar').style.display = '-webkit-box';
        $('#blah').addClass('bounceInUp');
        $('#blah').removeClass('vhImg');

        function func() {
            $('#blah').removeClass('bounceInUp');
        }
        setTimeout(func, 1000);
    }

    function readURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

</body>
</html>
