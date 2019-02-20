window.onload = function() {

    var wow = new WOW(
        {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
        }
    );
    wow.init();



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
            showTab(0);
            function showTab(a){

                for (let i = 0; i<$('.tab-info').length;i++){
                    $('.tab-info').eq(i).css('display','none');
                }

                $('.tab-info').eq(a).css('display','block')
            }

            $('.btn-tab').on('click', function(){
               // $index = $(this).data("pos");
                //console.log($(this).data("pos"))
                showTab($(this).data("pos"));
            });


//???????????????????????????????????????????????????????????
            document.getElementById('new-add').onclick = function () {
                document.getElementById('add').style.display = 'initial';
                $('#add').addClass('bounceInUp');
            }

        });
//???????????????????????????????????????????????????????????
    }
    if (pathBuf[1] == 'product' && parseInt(pathBuf[2]) > 0 && pathBuf.length >= 2) {

        $('#com-load').css('display','flex');
        let offset = 5;

        $('#com-load').click (function (event) {
            event.preventDefault();
            let comInfo = {id: parseInt(pathBuf[2]),offset: 0};
            comInfo.offset = offset;
            let $btnThis = $(this),
                flagEndCom = 0;
            $.ajax({
                url:    	location.protocol+"//"+location.hostname+'/product/ajaxLoadCom',
                type:		'POST',
                cache: 		false,
                data:   	{'data':JSON.stringify(comInfo)},
                dataType:	'text',
                beforeSend: function (data) {
                    $('#com-preload > div').addClass("btn-load");
                    $btnThis.css('display','none');
                },
                success: function(data) {
                    let newCom = JSON.parse(data);
                    console.log(newCom);
                    if (newCom[Object.keys(newCom).length -1 ] == true) {
                       console.log(Object.keys(newCom).length -2);
                       let m = 0;
                       while(Object.keys(newCom).length -2  >= m){
                            $("#list-comments > ul").append(newCom[m]);
                            m++;
                       }

                    } else {
                        setTimeout(function () {
                            $('#com-preload > span').html('На данный момент - это все комментарии');
                            flagEndCom = 1;
                            $btnThis.remove();
                        }, 1000);
                    }
                    setTimeout(function () {
                        $('#com-preload > div').removeClass("btn-load");
                        if(flagEndCom == 0){
                            $btnThis.css('display','flex');
                            offset++;
                        }

                    }, 2000);
                },
                error: function(data) {$('#com-preload > span').text("Проблема в работе сервера. Повторте через несколько минут");}
            });
        });

        $('#send').click (function (event) {
            event.preventDefault();
            let sendMsgInfo = {
                email: $('#email').val (),
                name : $('#name').val (),
                msg : $('#msg').val (),
                id: parseInt(pathBuf[2])
            };

            $('#error-msg > span').text ("");
            $.ajax({
                url:    	location.protocol+"//"+location.hostname+'/product/sendMsg',
                type:		'POST',
                cache: 		false,
                data:   	{'data':JSON.stringify(sendMsgInfo)},
                dataType:	'text',
                beforeSend: function () {
                  $('#error-msg > div').addClass("btn-load");
                  $(this).prop('disabled', true);
                },
                success: function(data) {
                    let errMsg = JSON.parse(data);

                    if (errMsg[0] == true) {

                        $("#list-comments > ul").prepend(errMsg[1]);

                        $('#name').val ("");
                        $('#email').val ("");
                        $('#msg').val ("");
                        $('#error-msg > span').html("Сообщение отправлено");
                        $('#email').css ("border-color", "#60fc8c");
                        $('#name').css ("border-color", "#60fc8c");
                        $('#msg').css ("border-color", "#60fc8c");

                    } else {
                        setTimeout(function () {

                                let strErrMsg = "";

                                for(let i =0; i < Object.keys(errMsg).length; i++){

                                    if(errMsg[i]=='Имя не должно быть короче 2-х символов'){
                                        $('#name').css ("border-color", "#f50606");
                                        strErrMsg +="- Введите больше 3 символов<br><br>";
                                    }
                                    if(errMsg[i]=='Имя содержит недопустимые символы'){
                                        $('#name').css ("border-color", "#f50606");
                                        strErrMsg +="- Имя содержит недопустимые символы<br><br>";
                                    }
                                    if(errMsg[i]=='Неправильный email'){
                                        $('#email').css ("border-color", "#f50606");
                                        strErrMsg +="- Неправильный email<br><br>";
                                    }
                                    if(errMsg[i]=='Возможно сообщение короче 10-ти символов или содержит оскорбления и т.п.'){
                                        $('#msg').css ("border-color", "#f50606");
                                        strErrMsg +="- Возможно сообщение короче 10-ти символов или содержит оскорбления и т.п.<br><br>";
                                    }
                                    if(errMsg[i]=='Нет ответа от сервера. Попробуйте через время'){
                                        $('#msg').css ("border-color", "#f50606");
                                        strErrMsg +="- Нет ответа от сервера. Попробуйте через время.<br><br>";
                                    }

                                }

                                $('#error-msg > span').html(strErrMsg);


                        }, 1000);
                    }
                    $(this).prop('disabled', false);
                    setTimeout(function () {
                        $('#error-msg > div').removeClass("btn-load");
                        offset++;
                    }, 1000);
                },
                error: function(data) {$('#error-msg > span').text("Проблема в работе сервера.Повторте через несколько минут");}
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


