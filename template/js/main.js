window.onload = function() {

    let path = window.location.pathname,
        pathBuf = path.split(`/`);

    if (window.location.pathname != '/' && pathBuf[1] != 'admin' && pathBuf[1] != 'cabinet') {
        $(document).ready(function () {

            let slideIndex = 0;
            let slides = document.getElementsByClassName("mySlides");
            showSlides();

            function showSlides() {
                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                slides[slideIndex - 1].style.display = "block";

                setTimeout(showSlides, 3500); // Change image every 7 seconds
            }
        });

    }
    if (pathBuf[1] == 'product' && pathBuf.length >= 2) {
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
//???????????????????????????????????????????????????????????
            document.getElementById('new-add').onclick = function () {
                document.getElementById('add').style.display = 'initial';
                $('#add').addClass('bounceInUp');
            }

        });
//???????????????????????????????????????????????????????????
    }
    if (pathBuf[1] == 'product' && parseInt(pathBuf[2]) > 0 && pathBuf.length >= 2) {

        $('#send').click (function (event) {
            event.preventDefault();
            let sendMsgInfo = {
                email: $('#email').val (),
                name : $('#name').val (),
                msg : $('#msg').val (),
            };

            //$('#error-msg > span').text ("");
            $.ajax({
                url:    	location.protocol+"//"+location.hostname+'/product/sendMsg/'+parseInt(pathBuf[2]),
                type:		'POST',
                cache: 		false,
                data:   	{'data':JSON.stringify(sendMsgInfo)},
                dataType:	'json',
                beforeSend: function () {
                    console.log("start msg");
                  //  $('#send').attr ("disabled", "disabled");
                   // $('#error-msg > div').addClass("btn-load");
                },
                success: function(data) {
                    console.log(data);
                    if (data == true) {
                        $('#name').val ("");
                        $('#email').val ("");
                        $('#msg').val ("");
                       // $('#error-msg > span').text ("Сообщение отправлено");
                        $('#email').css ("border-color", "#60fc8c");
                        $('#name').css ("border-color", "#60fc8c");
                        $('#msg').css ("border-color", "#60fc8c");

                    } else {
                        setTimeout(function () {
                            if (data == false)
                                $('#error-msg > span').text ("Проблема в работе сервера.Повторте через несколько минут");
                            else {
                                let err_msg = data;

                                switch (data) {
                                    case "Имя не должно быть короче 2-х символов":
                                    $('#name').css ("border-color", "#f50606");
                                    //$('#error-msg > span').text ("Введите больше 3 символов");
                                    break;
                                    case "Имя содержит недопустимые символы":
                                        $('#name').css ("border-color", "#f50606");
                                        //$('#error-msg > span').text ("Введите больше 3 символов");
                                        break;
                                    case "Неправильный email":
                                        $('#email').css ("border-color", "#f50606");
                                        //$('#error-msg > span').text ("Неверный e-mail");
                                        break;
                                    case "Возможно сообщение короче 10-ти символов или содержит оскорбления и т.п.":
                                        $('#msg').css ("border-color", "#f7b4b4");
                                        //$('#error-msg > span').text ("Неверный номер");
                                        break;
                                    default:
                                        $('#email').css ("border-color", "#f50606");
                                        $('#name').css ("border-color", "#f50606");
                                        $('#msg').css ("border-color", "#f50606");
                                       // $('#error-msg > span').text ("Заполните все поля");
                                        break;
                                }
                            }

                        }, 1000);
                    }
                   // $('#send').removeAttr ("disabled");
                  //  setTimeout(function () {
                  //      $('#error-msg > div').removeClass("btn-load");
                  //  }, 1000);
                },
                error: function(data) {console.log(data);}
            });
        });
    }
    if ((pathBuf[1] == 'product' || pathBuf[1] == 'news') && pathBuf.length >= 2) {
        console.log(1);
        $(document).ready(function () {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function (item) {
                        return item.el.attr('title') + '<small>TopShop</small>';
                    }
                }
            });
        });
    }


    if ((pathBuf[1] == 'cabinet' && pathBuf[2] == 'edit') || (pathBuf[1] == 'admin' && pathBuf[2] == 'prod' && pathBuf[3] == 'update')
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
    var RGBChange = function () {
        $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
    };


    if (pathBuf[1] != 'admin'){
        $(document).ready(function () {
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
    }
};


