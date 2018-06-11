
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