
      $(function(){
            "use strict";
		document.getElementById('hideInfo2').onclick = function() {
      		document.getElementById('info1').style.display = 'none';
      		document.getElementById('info2').style.display = 'block';
		}

		document.getElementById('hideInfo1').onclick = function() {
      		document.getElementById('info2').style.display = 'none';
      		document.getElementById('info1').style.display = 'block';
		}

        });

      $(document).ready(function() { // Ждём загрузки страницы
	
	$(".image").click(function(){	// Событие клика на маленькое изображение
	  	var img = $(this);	// Получаем изображение, на которое кликнули
		var src = img.attr('src'); // Достаем из этого изображения путь до картинки
		$("body").append("<div class='popup'>"+ //Добавляем в тело документа разметку всплывающего окна
						 "<div class='popup_bg'></div>"+ // Блок, который будет служить фоном затемненным
						 "<img src='"+src+"' class='popup_img' />"+ // Само увеличенное фото
						 "</div>"); 
		$(".popup").fadeIn(800); // Медленно выводим изображение
		$(".popup_bg").click(function(){	// Событие клика на затемненный фон	   
			$(".popup").fadeOut(800);	// Медленно убираем всплывающее окно
			setTimeout(function() {	// Выставляем таймер
			  $(".popup").remove(); // Удаляем разметку всплывающего окна
			}, 800);
		});
	});
	
});

      /*price range*/

      $('#sl2').slider();

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