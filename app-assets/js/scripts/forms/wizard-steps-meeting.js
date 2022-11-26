// Validate steps wizard

// Show form
var form = $(".steps-validation").show();

$(".steps-validation").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Görüşme Oluştur'
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }

        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {

        var datetimes = $('#start').val();
        var minHour = $('input[name="minHour"]').val();
        var maxHour = $('input[name="maxHour"]').val();
        console.log('Min: '+minHour);
        console.log(moment(datetimes).format("HH:mm"));
        console.log('Max: '+maxHour);

        if(moment(datetimes).format("HH:mm")>=minHour && moment(datetimes).format("HH:mm")<=maxHour ){
            // Swal.fire(
            //     'Saatte problem yok',
            //     'devamke',
            //     'success'
            //  );
             console.log($(this).serialize());
             Swal.fire({
                 title: "Lütfen Bekleyin",
                 text: "Görüşme Randevusu Oluşturuluyor...",
                 icon: "info",
                 showConfirmButton: true,
                 allowOutsideClick: false,
                 allowEscapeKey: false
             });
             $.ajax({
                 type: "POST",
                 url: "/api/insert/calendar/create-a-meeting-appointment",
                 data: $(this).serialize(),
                 success: function (res) {
                     var returnedData = JSON.parse(res);
                     if (returnedData['status'] == true) {
                         setTimeout(function() {
                             Swal.fire("Başarılı", "Hizmet başarılya oluşturuldu. Yönleniyorsunuz...", "success");
                             location.reload(1);
                         }, 2000);
                     } else {
                         if(returnedData['code'] == 1014){
                                 Swal.fire("Bölge Belirlenmedi", "Seçili Hizmet için en az Bir (1) Hizmet Bölgesi tanımlamanız gerekiyor", "warning");
                         }else{
                             alert('hata!');
                         }
                     }
                 }
             });
        }else{
            Swal.fire(
                'Saat Belirlenmedi🙄',
                'Lütfen Saat belirleyiniz  😉',
                'warning'
             );
        }


    }
});

// Initialize validation
$(".steps-validation").validate({
    ignore: 'input[type=hidden]', // ignore hidden fields
    errorClass: 'danger',
    successClass: 'success',
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element);
    },
    rules: {
        email: {
            email: true
        }
    }
});
