<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [40.7143528, -74.0059731],
                zoom: 9,
                controls: ['zoomControl',  'fullscreenControl']
            }),

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),
            myPlacemarkWithContent = new ymaps.Placemark([40.7143528, -74.0059731], {
                hintContent: 'Собственный значок метки с контентом',
                balloonContent: '<div style="  display: flex;\n' +
                    '  flex-direction: column;\n' +
                    '  justify-content: center;\n' +
                    '  align-items: center;">' +
                    '<img src="./template/images/logo.png" style="width: 40%;" alt="map-logo"> <div class="time-work">Мы работаем:\n' +
                    '09.00 - 17.00</div>' +
                    '<div class="time-work">Звоните нам по номерам:</br>+38010001</br>+38010333</div>' +
                    '</div>',
            }, {

                iconLayout: 'default#imageWithContent',
                iconImageHref: './template/images/logo-map-k.png',
                iconImageSize: [40, 40],
                iconImageOffset: [-24, -24],
                // Смещение слоя с содержимым относительно слоя с картинкой.
                iconContentOffset: [15, 15],
                // Макет содержимого.
                iconContentLayout: MyIconContentLayout
            });

        myMap.geoObjects
            .add(myPlacemarkWithContent);
        myMap.behaviors.disable('scrollZoom');
    });
</script>