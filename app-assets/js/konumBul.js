/*
Tarayıcıdan konum bilgisi alma fonksiyonu
*/
function konumSorgula() {
    // document.getElementById('durum_mesaj').innerHTML = `Konum sorgulanıyor...`;
    navigator.geolocation.getCurrentPosition(oldu, olmadi);
}
/* Tarayıcıdan konum sorgulama başarılı ise çağırdığımız fonksiyon */
    
function oldu(pos) {
    // document.getElementById('dogruluk').innerHTML = `${pos.coords.accuracy} metre`;
    // document.getElementById('durum_mesaj').innerHTML = `Konum sonucu bulundu`;
    // ÖRNEK
    // https://www.google.com/maps?output=embed&q=40.989491199999996,29.104537600000004
    // mapembed = `https://www.google.com/maps?output=embed&z=15&q=${pos.coords.latitude},${pos.coords.longitude}`;
    // console.log(mapembed);
    // document.getElementById('harita').setAttribute('src', mapembed);
    // console.log(pos);

    //AAAAAAAAAAAA

    var api_key = '9c20f74e390c420889465ac5bad145ea';
    var latitude = pos.coords.latitude;
    var longitude = pos.coords.longitude;

    var api_url = 'https://api.opencagedata.com/geocode/v1/json'

    var request_url = api_url
        + '?'
        + 'key=' + api_key
        + '&q=' + encodeURIComponent(latitude + ',' + longitude)
        + '&pretty=1'
        + '&no_annotations=1';

    // see full list of required and optional parameters:
    // https://opencagedata.com/api#forward

    var request = new XMLHttpRequest();
    request.open('GET', request_url, true);

    request.onload = function() {
        // see full list of possible response codes:
        // https://opencagedata.com/api#codes

        if (request.status === 200){ 
        // Success!
        var data = JSON.parse(request.responseText);
        // console.log(pos.coords.accuracy);
        if(pos.coords.accuracy<=100){
            $('#company-address').val(data.results[0].formatted);
            toastr['info']('Konum Bilgisi '+Math.round(pos.coords.accuracy)+' metre doğruluk ile sağlandı.', 'Konum Bilgisi', {
                closeButton: true,
                tapToDismiss: false,
                progressBar: true,
                positionClass: 'toast-bottom-right'
            });
                document.cookie = "lats="+latitude;
                document.cookie = "longs="+longitude;
                // company-Latitude
                // company-Longitude
                $('#company-Latitude').val(latitude);
                $('#company-Longitude').val(longitude);

        }else{
            toastr['warning']('Mobil Cihazınızın Konum Bilgisi '+Math.round(pos.coords.accuracy)+' metre çap içerisinde görünüyor.', 'Konum Bilgisi Hatalı', {
                closeButton: true,
                tapToDismiss: false,
                progressBar: true,
                positionClass: 'toast-bottom-right'
            });
        }

        } else if (request.status <= 500){ 
        // We reached our target server, but it returned an error
                            
        console.log("unable to geocode! Response code: " + request.status);
        var data = JSON.parse(request.responseText);
        console.log('error msg: ' + data.status.message);
        } else {
        console.log("server error");
        }
    };

    request.onerror = function() {
        // There was a connection error of some sort
        console.log("unable to connect to server");        
    };

    request.send();  // make the request

}
    
/* Tarayıcıdan konum sorgulama başarısız ise çağırdığımız fonksiyon */
    
function olmadi(hata) {
    // document.getElementById('durum_mesaj').innerHTML = `
    // <strong>Hata Kodu</strong> ${hata.code} <br>
    // <strong>Hata mesajı</strong> ${hata.message}
    // `;
    console.log(hata);
}
    
// console.log(navigator);
    