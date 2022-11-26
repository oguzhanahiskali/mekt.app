/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Wizard tabs with numbers setup
$(".number-tab-steps").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Paketi Oluştur'
    },
    onFinished: function (event, currentIndex) {
        alert("Paket başarıyla oluşturuldu.");
    }
});

// Wizard tabs with icons setup
$(".icons-tab-steps").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Paketi Oluştur'
    },
    onFinished: function (event, currentIndex) {
        alert("Paket başarıyla oluşturuldu.");
    }
});

// Validate steps wizard

// Show form
var form = $(".steps-validation").show();

$(".steps-validation").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Paketi Oluştur'
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
        Swal.fire({
            title: "Paket Oluşturuluyor",
            text: "Lütfen Bekleyin...",
            icon: "info",
            showConfirmButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        var OngorulebilirSeans = null
        if(return_ongurulebilir!=null){
            OngorulebilirSeans = return_ongurulebilir;
        }
        $.ajax({
            type: "GET",
            url: "/api/insert/calendar/create-a-service-card.php",
            data: $(this).serialize()+'&OngorulebilirSeans='+OngorulebilirSeans,
            success: function (res) {
                var returnedData = JSON.parse(res);
                if (returnedData['status'] == true) {
                    var SID = returnedData['SessionCard']['SID'];
                    setTimeout(function() {
                        Swal.fire("Başarılı", "Hizmet başarılya oluşturuldu. Yönleniyorsunuz...", "success");
                        window.location.href = 'session-details?CID='+SID;
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
