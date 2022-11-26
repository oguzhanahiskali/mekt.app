
function getLocation(){
    if (navigator.geolocation){navigator.geolocation.getCurrentPosition(showPosition);}
    else{x = "Tarayıcınız bu özelliği desteklemiyor.";}
}
function showPosition(position)
{
    var x;
    var lats;
    var longs;
    lats = position.coords.latitude
    longs = position.coords.longitude;
    document.cookie = "lats="+lats;
    document.cookie = "longs="+longs;
}
getLocation();

var lats = document.cookie.replace(/(?:(?:^|.*;\s*)lats\s*\=\s*([^;]*).*$)|^.*$/, "$1");
var longs = document.cookie.replace(/(?:(?:^|.*;\s*)longs\s*\=\s*([^;]*).*$)|^.*$/, "$1");

if ( lats.length && longs.length ){
    var getWeather = 'lat='+lats+'&lon='+longs;
    console.log('Konum bilgisi başarılı!');
}else{
    document.cookie = "lats=; max-age=0";document.cookie = "longs=; max-age=0";var getWeather = 'q=istanbul';
    console.log('Konum bilgisi başarısız');
}
$.ajax({
  type: "GET",
  cache: true,
  url: "https://api.openweathermap.org/data/2.5/weather?"+getWeather+"&appid=653c7873efdf6aad17a5d8f9019ab28a&units=metric&lang=tr",
  success: function(data) {
      city_name = data["name"];
      weather_description = data["weather"][0]["description"];
      weather_icon = data["weather"][0]["icon"];
      temp = data["main"]["temp"];

      $("#weatherCelcius").html(Math.round(temp)+"°");
      $("#weatherCity").html(city_name);
      $("#weatherStatus").html(weather_description);

      $("#weatherICON").attr("src", "/app-assets/images/weather/"+weather_icon+".png");
  }
});


// START CLOCK SCRIPT
// (function(){

// //generate clock animations
// // var now       = new Date(),
// //     hourDeg   = now.getHours() / 12 * 360 + now.getMinutes() / 60 * 30,
// //     minuteDeg = now.getMinutes() / 60 * 360 + now.getSeconds() / 60 * 6,
// //     secondDeg = now.getSeconds() / 60 * 360,
// //     stylesDeg = [
// //         "@-webkit-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
// //         "@-webkit-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
// //         "@-webkit-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}",
// //         "@-moz-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
// //         "@-moz-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
// //         "@-moz-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}"
// //     ].join("");

// // document.getElementById("clock-animations").innerHTML = stylesDeg;

// })();

// END CLOCK SCRIPT
