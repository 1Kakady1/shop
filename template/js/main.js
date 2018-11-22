window.onload = function(){

    let path = window.location.pathname,
    pathBuf= path.split(`/`);

console.log(window.location.pathname);
if (window.location.pathname != '/' && pathBuf[1] != 'admin' && pathBuf[1] != 'cabinet') {
    $(document).ready(function() {

        let slideIndex = 0;
        let slides = document.getElementsByClassName("mySlides");
        showSlides();
        function showSlides() {
            for ( let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";

            setTimeout(showSlides, 3500); // Change image every 7 seconds
        }
    });

}
if (pathBuf[1] == 'product' && pathBuf.length >=2) {
    $(function () {
        "use strict";
        document.getElementById('hideInfo2').onclick = function () {
            document.getElementById('info1').style.display = 'none';
            document.getElementById('info2').style.display = 'block';
        }

        document.getElementById('hideInfo1').onclick = function () {
            document.getElementById('info2').style.display = 'none';
            document.getElementById('info1').style.display = 'block';
        }

        document.getElementById('new-add').onclick = function () {
            document.getElementById('add').style.display = 'initial';
            $('#add').addClass('bounceInUp');
        }

    });

}
if ((pathBuf[1] == 'product' || pathBuf[2] == 'news' ) && pathBuf.length >=2 ){
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });
    });
}
console.log(pathBuf);
    if ((pathBuf[1] == 'cabinet' && pathBuf[2] == 'edit' ) ||(pathBuf[1] == 'admin' && pathBuf[2] == 'prod' && pathBuf[3] == 'update')
    || (pathBuf[1] == 'admin' && pathBuf[2] == 'prod' && pathBuf[3] == 'create')) {
        document.getElementById('imgInp').onclick = function () {

            document.getElementById('img-avatar').style.display = '-webkit-box';
            $('#blah').addClass('bounceInUp');
            $('#blah').removeClass('vhImg');

            function func() {
                $('#blah').removeClass('bounceInUp');
            }

            setTimeout(func, 1000);
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    }
      var RGBChange = function() {
          $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
      };

      /*scroll to top*/

      $(document).ready(function(){
          $(function () {
              $.scrollUp({
                  scrollName: 'scrollUp', // Element ID
                  scrollDistance: 300, // Distance from top/bottom before showing element (px)
                  scrollFrom: 'top', // 'top' or 'bottom'
                  scrollSpeed: 300, // Speed back to top (ms)
                  easingType: 'linear', // Scroll to top easing (see http://easings.net/)
                  animation: 'fade', // Fade, slide, none
                  animationSpeed: 200, // Animation in speed (ms)
                  scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
                  //scrollTarget: false, // Set a custom target element for scrolling to the top
                  scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
                  scrollTitle: false, // Set a custom <a> title if required.
                  scrollImg: false, // Set true to use image
                  activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                  zIndex: 2147483647 // Z-Index for the overlay
              });
          });
      });
};


