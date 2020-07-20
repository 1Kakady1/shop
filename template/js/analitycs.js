//установка куки
console.log("token dawdadawdaw",document.querySelector("meta[name='csrf-token']").getAttribute('content'));
function setCookie(name, value) {

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
  
    document.cookie = updatedCookie;
}

/*----------------------------------------------------------------------*/

//Считывание куки

/*----------------------------------------------------------------------*/

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

/*----------------------------------------------------------------------*/

//генератор имени 

/*----------------------------------------------------------------------*/

let symbolArr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
const compareRandom = ( ) => Math.random() - 0.5;
const randomInteger = ( min, max ) => Math.round(min - 0.5 + Math.random() * (max - min + 1));

function generatePostNameCookie() {
    symbolArr.sort(compareRandom);

    let postNameCookieLenght = 10;
    let postNameCookie = '';

    for (let i = 0; i < postNameCookieLenght; i++) {
        postNameCookie += symbolArr[randomInteger(0, symbolArr.length - 1)];
    }

    return postNameCookie;
}

/*--------------------------Отправка-------------------------------*/ 

// Пример отправки POST запроса:
// async function postData(url = '', data) {
//     // Default options are marked with *
//     const response = await fetch(url, {
//       method: 'POST', // *GET, POST, PUT, DELETE, etc.
//       headers: {
//           'Content-Type': 'application/json'
//         // 'Content-Type': 'application/x-www-form-urlencoded',
//       },
//       body: JSON.stringify(data) // body data type must match "Content-Type" header
//     });
//     return await response.json(); // parses JSON response into native JavaScript objects
// }
const instance = axios.create({
    'Content-Type': 'application/json',
    baseURL: 'http://top-shop.loc/',
});
/*----------------------------------------------------------------------*/



/*----------------------------------------------------------------------*/


/*----------------------------------------------------------------------*/


window.onload = function() {
    const getCookies = getCookie('flagVisit') //проверка на ключ
    if(sessionStorage.getItem('entryFlag') == undefined){
        sessionStorage.setItem('entryPoint', location.href); //точка входа
        sessionStorage.setItem('referrer_url', document.referrer); //определение откуда пришёл пользователь
        sessionStorage.setItem('entryFlag', 1) //возводим флаг первого входа
        sessionStorage.setItem('counterСheck', 0) //счётчик просмотренных страниц
    }
    let finalTime = 0
    let locationUrl = location.href
    sessionStorage.setItem('counterСheck', +sessionStorage.getItem('counterСheck')+1);
    console.log('Количество переходов', sessionStorage.getItem('counterСheck'))


    if(getCookies === undefined){ //если ключа нет устанавливаем куки с именем и локацией
        const nameCookie = 'user_' + generatePostNameCookie();
        let locationCoocie = '';

        YMaps.jQuery(function () {
            // Получение информации о местоположении пользователя
            if (YMaps.location) {
              locationCoocie = YMaps.location.region
            }
        });

        setCookie('user', nameCookie) //установка имени      
        setCookie('location', locationCoocie) //установка локации
        setCookie('flagVisit', 'flagVisit') //установка флага
    }


    if(sessionStorage.getItem('entryFlagObj') == undefined){
        sessionStorage.setItem('entryFlagObj', 1)

        let createNewObj = {
            user: getCookie('user'),
            location: getCookie('location'),
            referrer: sessionStorage.getItem('referrer_url'),
            renouncement: true,
            entryPoint: sessionStorage.getItem('entryPoint'),
            locationsUrl: [
                {
                    linkUrl: location.href,//придерживаемся этой идеи
                    timeCheck: [],
                    counterСheck: [1]

                }
            ]
        }
        
        sessionStorage.setItem("ObjToGo", JSON.stringify(createNewObj))
        console.log('Сейчас мы его создали первый раз:', sessionStorage.getItem('ObjToGo'))
        
        //код отправки первой аналитики

        //const objToGoFirst = JSON.parse(sessionStorage.getItem('ObjToGo'))
        //
        // let formData = new FormData();
        // formData.set('_token', document.querySelector("meta[name='csrf-token']").getAttribute('content'));//проверка на то откуда запрос произошёл, атаки csrf!!!
        // formData.set('key', 'key_Analitic');//проверка ключа пользователя
        // formData.set('data', sessionStorage.getItem('ObjToGo'));
        //
        // postData('http://top-shop.loc/api/v1/analytic', formData)
        //     .then((formData) => {
        //         console.log(formData); // JSON data parsed by `response.json()` call
        // })
        //     .catch((err)=>{
        //         console.log(err);
        //     });

        setTimeout(function(){
            let firstVisitTime = 10
            createNewObj.renouncement = true
            createNewObj.locationsUrl[0].timeCheck.push(firstVisitTime)

            console.log('10 сек прошло братик', createNewObj)

            //код отправки аналитики

            const objToGoFirst = JSON.parse(sessionStorage.getItem('ObjToGo'))

            // let formData = new FormData();
            // formData.set('_token', document.querySelector("meta[name='csrf-token']").getAttribute('content'));//проверка на то откуда запрос произошёл, атаки csrf!!!
            // formData.set('key', 'key_Analitic');//проверка ключа пользователя
            // formData.set('data', sessionStorage.getItem('ObjToGo'));
            //
            // postData('http://top-shop.loc/api/v1/analytic', formData)
            //     .then((formData) => {
            //         console.log(formData); // JSON data parsed by `response.json()` call
            // })
            //     .catch((err)=>{
            //         console.log(err);
            //     });

            //----------------------

            sessionStorage.setItem("ObjToGo", JSON.stringify(createNewObj))

            console.log('222222222222222', sessionStorage.getItem('ObjToGo') )


            let intervalConversion = setInterval(function(){
                    const interval = 5
                    firstVisitTime = firstVisitTime + interval
                    createNewObj.locationsUrl[0].timeCheck[0] = firstVisitTime
                    sessionStorage.setItem("ObjToGo", JSON.stringify(createNewObj))
                    
                    //код отправки аналитики

                    const objToGoFirst = JSON.parse(sessionStorage.getItem('ObjToGo'))

                    // let formData = new FormData();
                    // formData.set('_token', document.querySelector("meta[name='csrf-token']").getAttribute('content'));//проверка на то откуда запрос произошёл, атаки csrf!!!
                    // formData.set('key', 'key_Analitic');//проверка ключа пользователя
                    // formData.set('data', sessionStorage.getItem('ObjToGo'));
                    //
                    // postData('http://top-shop.loc/api/v1/analytic', formData)
                    //     .then((formData) => {
                    //         console.log(formData); // JSON data parsed by `response.json()` call
                    // });

                    //----------------------

                    console.log('время:', firstVisitTime, 'cек')
                },5000)
        }, 10000)
    }else{
        const objToGo = JSON.parse(sessionStorage.getItem('ObjToGo'))
        console.log('Мы его получили из сесии', objToGo)
        let isFlagUrlHear = false
        for (const item of objToGo.locationsUrl) {
            if (item.linkUrl === locationUrl) {
                isFlagUrlHear = true
            }
        }
        if (!isFlagUrlHear) {
            const arrElement = {
                linkUrl: location.href,
                timeCheck: [],
                counterСheck: []
            }
            objToGo.locationsUrl.push(arrElement)
            console.log('что то не так')
            sessionStorage.setItem('ObjToGo', JSON.stringify(objToGo))
        }

        const { locationsUrl } = objToGo
        const thisTimeObj = locationsUrl.find(({ linkUrl }) => linkUrl === locationUrl) 
        const { timeCheck } = thisTimeObj
        const { counterСheck } = thisTimeObj
        counterСheck.push(+sessionStorage.getItem('counterСheck'))
        timeCheck.push(0)
        sessionStorage.setItem('ObjToGo', JSON.stringify(objToGo))

        setInterval(function(){
            const interval = 5
            finalTime = finalTime + interval
            timeCheck[+timeCheck.length-1] = finalTime
            console.log(timeCheck)
            
            //код отправки аналитики

            const objToGoFirst = JSON.parse(sessionStorage.getItem('ObjToGo'))

            // let formData = new FormData();
            // formData.set('_token', document.querySelector("meta[name='csrf-token']").getAttribute('content'));//проверка на то откуда запрос произошёл, атаки csrf!!!
            // formData.set('key', 'key_Analitic');//проверка ключа пользователя
            // formData.set('data', sessionStorage.getItem('ObjToGo'));
            // //
            //

            instance.post('api/v1/analytic',JSON.stringify({
                key: 'key_Analitic',
                data: objToGoFirst,
            }))
                .then((res)=>{
                    console.log(res)
                })
                .catch((err)=>{
                    console.log(err)
                })

            //----------------------

            sessionStorage.setItem('ObjToGo', JSON.stringify(objToGo))
        },5000)
    }

 };